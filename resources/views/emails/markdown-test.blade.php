@component('mail::message')
# Introduction

<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid animi culpa dolor dolore ducimus ea, eaque eos
    fugiat illo incidunt itaque natus omnis quas quo saepe totam vero voluptatibus voluptatum.
</div>
<div>Autem, ducimus earum esse fugit impedit incidunt laudantium maiores molestias non officiis quasi quos repellat
    veritatis voluptatem voluptatibus. Atque eius illo labore maiores molestiae mollitia nobis qui recusandae temporibus
    voluptatibus.
</div>
<div>Alias, et eveniet facilis incidunt inventore nam possimus sit? Commodi cum quasi soluta. Accusamus accusantium
    aspernatur deserunt error, esse eum maxime, mollitia non pariatur possimus quam, quidem sit? Aliquid, beatae!
</div>

@component('mail::button', ['url' => ''])
Cliquez ici
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
