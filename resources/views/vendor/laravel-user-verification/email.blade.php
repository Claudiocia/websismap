<h3>{{config('app.name')}}</h3>
<p>Sua conta na nossa plataforma foi criada</p>
<p>
    Clique
    <a href="{{ $link = route('email-verification.check', $user->verification_token) . '?email=' . urlencode($user->email) }}">
        Aqui
    </a>
    para confirmar a criação da sua conta. Depois de confirmada a sua conta você será redirecionado para registrar a sua senha.
</p>
<p>Obs.: Não responda este e-mail, ele é gerado automaticamente</p>
