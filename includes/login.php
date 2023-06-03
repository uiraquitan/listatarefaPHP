<div class="form">
    <form action="" method="post">
    <div class="msg">
            <?= $message ?>
        </div>
        <h1>Faça o seu login</h1>
        
        <div class="form_group">
            <label for="">Login</label>
            <input type="text" name="email">
        </div>

        <div class="form_group">
            <label for="password">Senha</label>
            <input type="password" name="password" class="form_control">
        </div>

        <div class="form_btn">
            <button type="submit">Logar</button>
            <a href="cadastrar.php">Cadastrar</button>
        </div>
    </form>
</div>
