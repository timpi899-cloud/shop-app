<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoicePembelian extends Mailable
{
    use Queueable, SerializesModels;

    public function build()
    {
        return $this->subject('Invoice Pembelian Baju - Toko Keren')
                    ->html("
                        <h2>INVOICE PEMBELIAN</h2>
                        <p>Terima kasih telah berbelanja di <strong>Toko Baju Keren</strong>.</p>
                        <p>Berikut detail pembelian Anda:</p>
                        <ul>
                            <li>Produk: Baju Polos Premium</li>
                            <li>Ukuran: L</li>
                            <li>Harga: Rp 120.000</li>
                            <li>Jumlah: 1</li>
                            <li>Total: Rp 120.000</li>
                        </ul>
                        <p><em>Pembayaran diterima melalui transfer bank.</em></p>
                        <p>Semoga hari Anda menyenangkan!</p>
                    ");
    }
}
