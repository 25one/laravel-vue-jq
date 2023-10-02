<?php

namespace App\Listeners;

use App\Events\ProductEvent;

class ProductInformer
{   
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  ProductEvent  $event
     * @return void
     */
    public function handle(ProductEvent $event)
    {   
       //...for example send somewhere(mail, telegram...)
    }
}
