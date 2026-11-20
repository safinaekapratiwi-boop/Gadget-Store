@extends('layouts.app')

@section('title', 'Edit Kategori')
@section('page_heading', 'Edit Kategori')

@section('content')

<style>
    .category-edit-page {
        color: #26354a;
    }

    .category-edit-header {
        margin-bottom: 25px;
    }

    .category-edit-header h3 {
        color: #17243b;
        font-weight: 800;
        margin-bottom: 5px;
    }

    .category-edit-header p {
        color: #8793a5;
        font-size: 13px;
        margin: 0;
    }

    .category-edit-card {
        background: white;
        border-radius: 17px;
        border: 1px solid #e8edf5;
        box-shadow: 0 5px 20px rgba(30,50,80,.05);
        overflow: hidden;
    }

    .category-edit-card-header {
        padding: 20px 25px;
        background: linear-gradient(135deg, #17243b, #263c5e);
        color: white;
    }

    .category-edit-card-header h5 {
        font-weight: 800;
        margin: 0;
        font-size: 16px;
    }

    .category-edit-card-header p {
        margin: 5px 0 0;
        font-size: 12px;
        color: #b8c9e2;
    }

    .category-edit-card-body {
        padding: 25px;
    }

    .category-edit-card-body label {
        color: #34445b;
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .category-edit-card-body .form-control,
