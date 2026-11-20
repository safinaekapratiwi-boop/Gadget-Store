@extends('layouts.app')

@section('title', 'Edit Produk')
@section('page_heading', 'Edit Produk')

@section('content')

<style>
    .edit-product-page {
        color: #26354a;
    }

    .edit-product-header {
        margin-bottom: 25px;
    }

    .edit-product-header h3 {
        color: #17243b;
        font-weight: 800;
        margin-bottom: 5px;
    }

    .edit-product-header p {
        color: #8793a5;
        font-size: 13px;
        margin: 0;
    }

    .edit-product-card {
        background: white;
        border-radius: 17px;
        border: 1px solid #e8edf5;
        box-shadow: 0 5px 20px rgba(30,50,80,.05);
        overflow: hidden;
    }

    .edit-product-card-header {
        padding: 20px 25px;
        background: linear-gradient(135deg, #17243b, #263c5e);
        color: white;
    }

    .edit-product-card-header h5 {
        font-weight: 800;
        margin: 0;
        font-size: 16px;
    }

    .edit-product-card-header p {
        margin: 5px 0 0;
        font-size: 12px;
        color: #b8c9e2;
    }

    .edit-product-card-body {
        padding: 25px;
    }

    .edit-product-card-body label {
        color: #34445b;
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .edit-product-card-body .form-control,
    .edit-product-card-body .form-select {
        border: 1px solid #e1e8f1;
        border-radius: 10px;
        padding: 11px 13px;
        font-size: 13px;
        transition: .2s;
    }

    .edit-product-card-body .form-control:focus,
    .edit-product-card-body .form-select:focus {
        border-color: #4778e6;
        box-shadow: 0 0 0 3px rgba(71,120,230,.1);
    }

    .edit-product-actions {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        margin-top: 25px;
        padding-top: 20px;
        border-top: 1px solid #edf1f7;
    }

    .btn-update-product {
        background: linear-gradient(135deg, #4778e6, #39c6d8);
        color: white;
        border: none;
        padding: 11px 22px;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 800;
        transition: .2s;
    }

    .btn-update-product:hover {
        color: white;
        transform: translateY(-1px);
        box-shadow: 0 5px 15px rgba(71,120,230,.2);
    }

    .btn-cancel-product {
        background: #f1f4f9;
        color: #64748b;
        padding: 11px 20px;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 700;
        text-decoration: none;
    }

    .btn-cancel-product:hover {
        background: #e5ebf4;
        color: #26354a;
    }

    .edit-product-note {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        background: #f1f7ff;
        border: 1px solid #e0edff;
        border