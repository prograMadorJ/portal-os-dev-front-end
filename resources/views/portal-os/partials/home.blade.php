<div class="marketing">
    <div class="marketing__panel">
        <div class="marketing__info-left">
            <h1>
                Nós agendamos sua <br>
                consulta médica de <br>
                forma rápida e segura
            </h1>
        </div>
        <div class="marketing__info-right">
            <h2>
                Conectamos você aos melhores <br>
                especialistas de sua cidade em até 48h.
            </h2>
            <a href="#encontre-medico">ENCONTRE MEU MÉDICO</a>
            <hr>
            <span>Conheça histórias de quem já se consultou.</span>
        </div>
    </div>
</div>

<div class="scheduling">
    <div class="scheduling__form">
        <v-form v-model="valid">
            <v-text-field
                    id="name"
                    label="Nome"
                    v-model="name"
                    :rules="nameRules"
                    required
            ></v-text-field>
            <v-text-field
                    id="email"
                    label="E-mail"
                    v-model="email"
                    :rules="emailRules"
                    required
            ></v-text-field>
        </v-form>
    </div>
</div>

<div class="steps">
    <div class="steps__title">
        <h1>
            Como funciona o agendamento?
        </h1>
        <h2>
            São apenas 4 passos que separam você
            de sua consulta médica
        </h2>
    </div>
    <div class="steps__group">
        <div class="steps__step">
            @include('components.graphics.clipboard')
            <h3>DEIXE SEUS DADOS <br> DE CADASTRO</h3>
            <span>
                Preencha corretamente <br> nosso
                formulário, com <br> todos os seus dados.São
            </span>
        </div>
        <div class="steps__step">
            @include('components.graphics.calendary')
            <h3>ESCOLHA O MELHOR <br> DIA E HORÁRIO</h3>
            <span>
                Durante o cadastro <br> escolha o melhor <br> dia
                da semana
            </span>
        </div>
        <div class="steps__step">
            @include('components.graphics.stethoscope')
            <h3>NÓS TE LIGAREMOS <br> PARA AGENDAR</h3>
            <span>
                   Com os seus dados <br> nossas  consultoras <br>
                agendam a consulta
            </span>
        </div>
        <div class="steps__step">
            @include('components.graphics.doctor')
            <h3>VOCÊ SE CONSULTA <br> COM O ESPECIALISTA</h3>
            <span>
                Depois de tudo agendado <br> você vai até
                o consultório <br> no dia e horário
            </span>
        </div>
    </div>
</div>

<div class="know-more">
    <div class="know-more__card-group">
        <div class="know-more__card-one">
            <h2>TRATAMENTOS</h2>
            <span>
                Você já percebeu que tem algum problema
                auditivo e quer ajuda para encontrar o tratamento
                ideal para o seu caso?
            </span>
            <a href="#saiba-mais">SAIBA MAIS</a>
        </div>
        <div class="know-more__card-two">
            <h2>INDIQUE</h2>
            <span>
                Que tal ajudar alguém com problemas audiditos
                a encontrar a melhor solução para o problema dela?
                Indique e ganhe!
            </span>
            <a href="#saiba-mais">SAIBA MAIS</a>
        </div>
    </div>
    <div class="know-more__card-three">
        <span>
            São mais de 100 cidades com atendimento por todo o Brasil
            estamos prontos para te ajudar.
            <a href="#cadastro">
                <b>Cadastre-se já!</b>
            </a>
        </span>
        <a href="#agendamento"><h3>AGENDE AGORA</h3></a>
    </div>
</div>