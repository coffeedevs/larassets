<?php

class AssetsTest extends TestCase
{
    use \Illuminate\Foundation\Testing\WithoutMiddleware;
    protected $hrefCase = '<link rel="stylesheet" href="/css/coffeedevs.css">';
    protected $srcCase = '<script src="/js/clipboard.min.js"></script>';
    protected $httpHrefCase = '';
    protected $httpSrcCase = '<script src="http://cdnjs.cloudflare.com\/ajax\/libs\/vue\/1.0.16\/vue.min.js">';
    protected $httpsHrefCase = '<link href="https://fonts.googleapis.com\/css?family=Open+Sans\' rel=\'stylesheet\' type=\'text/css\'>';
    protected $httpsSrcCase = '<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.16/vue.min.js">';
    protected $agnosticHrefCase;
    protected $agnosticSrcCase;

    public function testAssetApply()
    {
        array_first($this->post('apply', ['string' => $this->hrefCase, 'secure' => false]))->see('{{ asset(\'/css/coffeedevs.css\'>"');
    }
}
