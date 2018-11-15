<?php
namespace Package\Controller;

use Package\Middleware\Token;
use Package\Model\Book;
use Package\App\Input;
use Package\App\Session;
use Package\App\File;

class BookController {
  private $controller;

  public function __construct(){
    $this->controller = new Book();
  }

  public function showBook($id){
    $book = $this->controller->showBookJoinCategory($id);
    if ($book) view('book', 'desktop', (Array) $book);
    else {
      http_response_code(404);
      view('404');
    }
  }

  public function upload(){
    $uuid = uuid();
    $id = $this->controller->checkId($uuid) ? uuid() : $uuid;
    $judul = trim(Input::get('Judul'));
    $penulis = trim(Input::get('Penulis'));
    $penerbit = trim(Input::get('Penerbit'));
    $halaman = trim(Input::get('Halaman'));
    $kategori = trim(Input::get('Kategori'));
    $deskripsi = trim(Input::get('Deskripsi'));
    $diupload = Session::get('username');
    if (csrfverify()) {
      $file = (new File(ROOT))->setPath("uploads/books/{$id}/");
      $upload = $file->upload([
        'cover' => $_FILES['cover'],
        $judul => $_FILES['buku']
      ], 500, 700);
      if ($upload->success()) {
        $filePath = $upload->getSuccessPath();
        $insert = $this->controller->insert([
          'Id' => $id,
          'Judul' => $judul,
          'Penulis' => $penulis,
          'Penerbit' => $penerbit,
          'Halaman' => $halaman,
          'Kategori' => $kategori,
          'Deskripsi' => $deskripsi,
          'Diupload' => $diupload,
          'Cover' => $filePath['cover'],
          'Buku' => $filePath[$judul]
        ]);
        if ($insert) {
          http_response_code(200);
          die(json_encode([
            'status' => http_response_code(),
            'msg' => 'Buku berhasil di upload !'
          ]));
        }else {
          http_response_code(500);
          die(json_encode([
            'status' => http_response_code(),
            'msg' => 'Internal Server Error'
          ]));
        }
      }else {
        http_response_code(400);
        die(json_encode([
          'status' => http_response_code(),
          'msg' => $upload->getErrors()
        ]));
      }
    }else {
      http_response_code(403);
      die(json_encode([
        'status' => http_response_code(),
        'msg' => 'Akses ditolak, invalid Token !'
      ]));
    }
  }

  public function listUserCollections(){
    $username = Input::get('username');
    $collections = $this->controller->getAllJson([
      'Diupload' => ['=' => $username]
    ], 'Id, Judul, Deskripsi, Cover, Buku');
    die($collections);
  }

  public function listAllCategories(){
    die($this->controller->listAll('Categories'));
  }

  public function listAllBooks(){
    die($this->controller->listAll());
  }

}

?>
