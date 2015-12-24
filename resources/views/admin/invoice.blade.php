@extends('admin')

@section('content1')
    <h1 align="left">Invoicing</h1>

    <p>Actions</p>
    <ul>
        <li><a href="/invoice/create">New Invoice</a></li>
    </ul>
    <p>Admin</p>
    <ul>
    <li><a href="/invoice">Invoices</a></li>
    <li><a href="/invoiceitem">Invoice Items</a></li>
    <li><a href="/customer">Customers</a></li>
    </ul>
@stop
