<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>
		</title>
	</head>

	<body>
		<p>
		    Nome: {{ $contato->nome }}
		</p>

		<p>
		    WhatsApp ou Telefone: {{ $contato->telefone }}
		</p>

		<p>
		    E-mail: {{ $contato->email }}
		</p>

		<p>
			Especialidade: {{ $contato->especialidade }}
		</p>

		<p>
		    Cidade: {{ $contato->cidade }}
		</p>

		<p>
		    Comentário: {{ $contato->conteudo }}
		</p>
	</body>
</html>
