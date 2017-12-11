require ('../app.js');

var map;

var markers = [];

var infoWindow = new google.maps.InfoWindow();
var geocoder = new google.maps.Geocoder();
var conteudo = [];

function initialize() {
    renderMap(4, -15.78168165, -47.88391113);
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(locationSuccess, locationFail);
        function locationSuccess(position) {
            console.log('Localização encontrada.');
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            renderMap(9, latitude, longitude);
        }
        function locationFail() {
            console.log('Oops, não encontramos sua localização.');
        }
    }
}

function renderMap(zoom, latitude, longitude) {
    var latlng = new google.maps.LatLng(latitude, longitude);

    var options = {
        zoom: zoom,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    var styles = [
        {
            stylers: [
                { hue: "#f7b49b" },
                { saturation: -20 }
            ]
        }
    ];

    geocoder = new google.maps.Geocoder();

    map = new google.maps.Map(document.getElementById("mapa"), options);
    map.setOptions({styles: styles});
    marcarFono('/clinicas/brasil-fonos.json');
}

function updateMap(endereco, zoom) {
    geocoder.geocode({ 'address': endereco + ', Brasil', 'region': 'BR' }, function (results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            if (results[0]) {
                var latitude = results[0].geometry.location.lat();
                var longitude = results[0].geometry.location.lng();

                var location = new google.maps.LatLng(latitude, longitude);

                map.setCenter(location);
                map.setZoom(zoom);
            }
        }
    });
}

function marcarFono(url) {
    $.ajax({
        url: url,
        method: 'GET',
        success: function(pontos) {
            pontos = $.parseJSON(pontos);
            var total = Object.keys(pontos).length;
            for (i=0; i < total; i++) {
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(pontos[i].Latitude, pontos[i].Longitude),
                    title: pontos[i].descricao,
                    map: map
                });
                markers.push(marker);

                conteudo[i] = '<a target="_blank" href="https://maps.google.com/maps?q=' +
                    pontos[i].Latitude +',' + pontos[i].Longitude + '">';
                conteudo[i] += "<h4>"+ String(pontos[i].Nome_fono) +"</h4>"+
                    String(pontos[i].Endereco)+", "+
                    String(pontos[i].Numero)+ " - " +
                    String(pontos[i].Bairro)+ "<br/>";
                if (pontos[i].Complemento != null) {
                    conteudo[i] += String(pontos[i].Complemento) +"<br/>";
                }
                conteudo[i] += String(pontos[i].descricao) + " - " +
                    String(pontos[i].CEP);
                conteudo[i] += '</a><br/><br/>';
                conteudo[i] += 'Ligue Grátis: <h5>0800 941 5330</h5>';

                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infoWindow.setContent(conteudo[i]);
                        infoWindow.open(map, marker);
                    }
                })(marker, i));
            }
        }
    });
}

function divFonos(data, i) {
    if (i%2 == 0) {
        var div = '<div id="local-fono" class="row">';
    } else {
        var div = '';
    }
    div += '<div class="col-md-6 local-fono">';
    div += '<p class="cidade">' + data.descricao + '</p>';
    div += '<p class="fono">Fonoaudiólogo(a):</p>';
    div += '<p class="nome-fono">' + data.Nome_fono + '</p>';
    div += '<p class="endereco">Endereço:</p>';
    div += '<p class="endereco-fono">'
            + data.Endereco
            + ', '
            + data.Numero
            + ' - '
            + data.Bairro;
    div += (data.Complemento != null) ? ' - ' : '';
    div += (data.Complemento != null) ? data.Complemento : '';
    div += ' - CEP: '
            + data.CEP
            + '</p>';
    div += "</div>"
    if (i%2 != 0) {
        div += '</div>';
    }
    return div;
}

function ajaxFonos(url) {
    $.ajax({
        url: url,
        method: 'GET',
        success: function(fonos) {
            var fonos = $.parseJSON(fonos);
            var j = Object.keys(fonos).length;
            var html = '';
            for (i=0;i<j;i++) {
                html += divFonos(fonos[i], i);
            }
            $('#locais').html(html);
        }
    });
}

function gerarCidades(id) {
    $.ajax({
        url: '/clinicas/cidades/'+id+'.json?group=true',
        method: 'GET',
        success: function(data) {
            // console.log(data);
            var data = $.parseJSON(data);
            var total = Object.keys(data).length;
            var options = '<option value="0">Selecione a Cidade</option>';
            for (i=0; i<total; i++) {
                 options += '<option value="' + data[i].id_cidade + '">' + data[i].descricao + '</option>';
                // console.log(data[i]);
            }
            ajaxFonos('/clinicas/cidades/'+id+'.json');
            $('#cidades').html(options);
            $('#clinicas').show();
        }
    });
}

$('#estados').change(function() {
    $('#cidades').hide();
    $('#cidade').hide();
    $('.franquias-detalhes').hide();

    var id = $('#estados').val();

    updateMap($('#estados').find('option:selected').text(), 6);
    var total = Object.keys(markers).length;
    for (i=0; i<total; i++) {
        markers[i].setMap(null);
    }
    marcarFono('/clinicas/cidades/'+id+'.json');
    gerarCidades(id);
    $('#cidades').show();
});

$('#cidades').change(function() {
    $('.franquias-detalhes').hide();

    var cidade = $('#cidades').find('option:selected').text();
    var id = $('#cidades').val();
    $('#cidade').html(cidade);
    var total = Object.keys(markers).length;
    for (i=0; i<total; i++) {
        markers[i].setMap(null);
    }
    updateMap(cidade, 11);
    marcarFono('/clinicas/cidade/'+id+'.json');
    $('#cidade').show();
    ajaxFonos('/clinicas/cidade/'+id+'.json');
});

$('.btn-franquia').click(function() {
    var id = $(this).data('id');
    var id_gdo = $(this).data('id-gdo');
    $('.franquias-detalhes').hide();
    $('#locais').html('');
    // Marcar Fonos
    var total = Object.keys(markers).length;
    for (i=0; i<total; i++) {
        markers[i].setMap(null);
    }
    $.ajax({
        url: '/clinicas/franquia/'+id_gdo+'.json',
        method: 'GET',
        success: function(data) {
            var data = $.parseJSON(data);
            var total = Object.keys(data).length;
            for(i=0; i<total; i++)
                updateMap(data[i].Endereco, 18);
        }
    });
    marcarFono('/clinicas/franquia/'+id_gdo+'.json');
    $('#franquia-'+id).show();
});

$('#mapaCover').click(function() {
    $(this).children('#mapa').removeClass('remove_scroll');
});

$('#mapaCover').mouseleave(function() {
    $(this).children('#mapa').addClass('remove_scroll');
});

/*******************************************************************************
*   Inicialização do Map
*******************************************************************************/

initialize();
