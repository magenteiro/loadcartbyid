# Magenteiro_LoadCartById module

When [creating an empty cart in graphQL](https://developer.adobe.com/commerce/webapi/graphql/schema/cart/mutations/create-empty-cart/) you are given a masked cart id.


With this module, you can load its cart in the current session within your Magento store. Its useful if you don't want to handle the checkout process on third party url.

_Quando [criamos um carrinho vazio no graphQL](https://developer.adobe.com/commerce/webapi/graphql/schema/cart/mutations/create-empty-cart/), ganhamos um id de quote mascarado._

_Com este módulo é possível carregar este carrinho na seção da loja Magento. Isto é útil caso deseje dar continuidade ao checkout dentro do próprio Magento._

## Installation details (Instalação)

`composer require magenteiro/loadcartbyid`

`bin/magento module:enable Magenteiro_LoadCartById`


## How to use (Como usar)

Access https://yourmagento.store/loadcart?cartId=XYZ.

For example: https://yourmagento.store/loadcart/?cartId=gwTPpsAQtI4P8YmQVreBnDw1bZqL4dK0

The quote will be loaded in the current session and the user will be redirected to /checkout/cart to complete transaction.

_Visite https://sualojamagento.com.br/loadcart?cartId=XYZ._

_Por exemplo: https://sualojamagento.com.br/loadcart/?cartId=gwTPpsAQtI4P8YmQVreBnDw1bZqL4dK0_

_O carrinho será carregado com os produtos da quote especificada e o usuário será levado para o carrinho._
 

## License (Licença)
GPL v3


## Author

Ricardo Martins <ricardo@magenteiro.com>

This module is part of part of our [Next.JS Course](https://magenteiro.com/nextjs). 

_Este módulo é parte do [Curso de Next.JS](https://magenteiro.com/nextjs) do Magenteiro.com._ 
