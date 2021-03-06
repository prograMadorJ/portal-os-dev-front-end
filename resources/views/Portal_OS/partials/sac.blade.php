<div class="sac">
    <div class="sac__title">
        <h1>
            Fale Conosco
        </h1>

        <h3>
            Nós estamos sempre dispostos a te ouvir, escreva sua mensagem!
        </h3>
    </div>

    <form class="sac__form" action-xhr="javascript:" method="POST" target="_top">
        {{ csrf_field() }}
        <div class="form__group">
            <input type="text" name="name" id="name" placeholder="Nome"
                   pattern="[A-Za-z]+" maxlength="50" required>
        </div>

        <div class="form__group">
            <input type="text" name="phone" id="phone" placeholder="Whatsapp ou Telefone (99)99999-9999"
                   maxlength="15"
                   pattern="^\([1-9]{2}\)\s[0-9]{5}-[0-9]{4}$|^\([1-9]{2}\)\s[0-9]{4}-[0-9]{4}$"
                   required>
        </div>

        <div class="form__group">
            <input type="email" name="email" id="email" placeholder="E-Mail"
                   maxlength="100" required>
        </div>

        <div class="form__group">
            <select name="specialty" id="specialty">
                <option disabled="true" selected="true">
                    Especialidade
                </option>
                <option>
                    Especialidade UM
                </option>
                <option>
                    Especialidade DOIS
                </option>
            </select>
            <i></i>
        </div>

        <div class="form__group">
            <input type="text" name="cidade" id="city" placeholder="Cidade"
                   pattern="[A-Za-z]+" maxlength="50" required>
        </div>

        <div class="form__group">
            <textarea name="comment" id="" cols="30" rows="3" placeholder="Comentário"></textarea>
        </div>

        <div class="form__group">
            <button type="submit">
                Quero iniciar
            </button>
        </div>
    </form>
</div>
