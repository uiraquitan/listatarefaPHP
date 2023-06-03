<div class="form">
    <form action="" method="post">
        <div class="msg">
            <?= $message ?>
        </div>
        <h1>Faça o seu Cadatro</h1>

        <div class="form_group">
            <label for="">Nome</label>
            <input type="text" name="name">
        </div>

        <div class="form_group">
            <label for="">E-mail</label>
            <input type="text" name="email">
        </div>

        <div class="form_group">
            <label for="password">Senha</label>
            <input type="password" name="password" class="form_control">
        </div>

        <div class="form_btn">
            <a href="index.php">Logar</a>
                <button>Cadastrar</button>
        </div>
    </form>
</div>