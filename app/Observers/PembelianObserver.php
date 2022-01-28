<?php

namespace App\Observers;

use App\Models\Pembelian_Model;

class PembelianObserver
{
    /**
     * Handle the Pembelian_Model "created" event.
     *
     * @param  \App\Models\Pembelian_Model  $pembelian_Model
     * @return void
     */
    public function created(Pembelian_Model $pembelian_Model)
    {
        //
    }

    /**
     * Handle the Pembelian_Model "updated" event.
     *
     * @param  \App\Models\Pembelian_Model  $pembelian_Model
     * @return void
     */
    public function updated(Pembelian_Model $pembelian_Model)
    {
        //
    }

    /**
     * Handle the Pembelian_Model "deleted" event.
     *
     * @param  \App\Models\Pembelian_Model  $pembelian_Model
     * @return void
     */
    public function deleted(Pembelian_Model $pembelian_Model)
    {
        //
    }

    /**
     * Handle the Pembelian_Model "restored" event.
     *
     * @param  \App\Models\Pembelian_Model  $pembelian_Model
     * @return void
     */
    public function restored(Pembelian_Model $pembelian_Model)
    {
        //
    }

    /**
     * Handle the Pembelian_Model "force deleted" event.
     *
     * @param  \App\Models\Pembelian_Model  $pembelian_Model
     * @return void
     */
    public function forceDeleted(Pembelian_Model $pembelian_Model)
    {
        //
    }
}
