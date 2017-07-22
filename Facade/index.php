<?php

class Message
{
    function welcome()
    {
        echo "slamat datang \n";
    }

    function thanks()
    {
        echo "terimakasih telah bertransaksi \n";
    }
}

class Transaksi
{
    function penarikan($nominal)
    {
        echo "anda melakukan penarikan sebesar $nominal";
    }
}

class Atm
{
    protected $message;
    protected $transaksi;

    public function __construct()
    {
        $this->message = new Message();
        $this->transaksi = new Transaksi();
    }

    public function tarikTunai($nominal)
    {
        $this->message->welcome();
        $this->transaksi->penarikan($nominal);
        $this->message->thanks();
    }
}

$atm = new Atm();
$atm->tarikTunai(25000);