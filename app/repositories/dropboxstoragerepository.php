<?php

use League\Flysystem\Dropbox\DropboxAdapter;
use League\Flysystem\Filesystem;
use Dropbox\Client;

class DropboxStorageRepository{

    protected $client;
    protected $adapter;
    public function __construct()
    {
        $this->client = new Client('RwGfxvZm4iUAAAAAAAAENynwxsMe-61Abeqe2bQLnGniT1YiVrDoDyRi6tGWAL6q', 'Askify-App', null)
        $this->adapter = new DropboxAdapter($this->client);
    }
    public function getConnection()
    {
        return new Filesystem($this->adapter);
    }
}