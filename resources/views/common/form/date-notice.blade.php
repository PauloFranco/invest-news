<div class="text-muted mrg-top-10 form-calendar-notice hidden">
    Se o seu navegador não suporta o controle de calendário, informe a data no formato
    <code>aaaa-mm-dd</code>, onde:
    <ul>
        <li><code>aaaa</code> é o ano com 4 dígitos (ex. <kbd>{{ now_tz()->format('Y') }}</kbd>)</li>
        <li><code>mm</code> é o mês com 2 dígitos (ex. <kbd>{{ now_tz()->format('m') }}</kbd>)</li>
        <li><code>dd</code> é o dia com 2 dígitos (ex. <kbd>{{ now_tz()->format('d') }}</kbd>)</li>
        <li></li>
    </ul>
    <p>Por exemplo, se a data desejada fosse <strong>hoje</strong>, informe <kbd>{{ now_tz()->format('Y-m-d') }}</kbd>.</p>
</div>
