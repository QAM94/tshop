@extends('panel.master')
@section('main')
    <div class="content ht-100v pd-0">
        <div class="content-body">
            <div class="container pd-x-0 tx-13">
                <div class="d-flex align-items-center justify-content-between position-relative">
                    <h4 id="section1" class="mg-b-0">Recalled Products</h4>
                    <button class="btn btn-success add-class" type="button" id="dropdownMenuButton">
                        Filter Products
                    </button>
                </div>
                <div class="filter-dropdown">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Product Name</label>
                                <input type="text" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect2">Batch ID</label>
                                <select class="form-control" id="exampleFormControlSelect2">
                                    <option>Select Batch ID</option>
                                    <option>2627</option>
                                    <option>3738</option>
                                    <option>5657</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Recall Date</label>
                                <input type="text" class="form-control" name="daterange" value="01/01/2018 - 01/15/2018"/>
                            </div>
                        </div>
                        <div class="col-md-6 text-right d-flex justify-content-end align-items-center">
                            <button type="button" class="btn btn-success remove-class">Apply</button>
                        </div>
                    </div>
                </div>
                <div class="row row-xs mt-2">
                    <div class="col-sm-12 col-lg-12">
                        <div class="card card-body dataTableBox">
                            <table id="example1" class="table custom-recalled">
                                <thead>
                                <tr>
                                    <th class="">Product Name</th>
                                    <th class="">Batch ID</th>
                                    <th class="">Category</th>
                                    <th class="widthSet">Description</th>
                                    <th class="">Recall Date</th>
                                    <th class="">Status</th>
                                    <th class="">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Apple</td>
                                    <td>15</td>
                                    <td>Small</td>
                                    <td class="description-td">Testing...</td>
                                    <td>12/02/2020</td>
                                    <td>
                                        <span class="success-circle"></span>
                                        Email
                                        <span class="tooltiptext">Email has been sand</span>
                                    </td>
                                    <td class="position-relative">
                                        <button class="btn btn-sm dropdown-toggle" type="button" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                            Actions
                                        </button>
                                        <div class="dropdown-menu" x-placement="top-start"
                                             style="position: absolute; transform: translate3d(0px, -165px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <a class="dropdown-item" href="#viewModal" data-toggle="modal">View Details</a>
                                            <a class="dropdown-item" href="customer_details.html">Customer Details</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#modalQuickEmail" data-toggle="modal">Quick
                                                Email</a>
                                            <a class="dropdown-item" href="#modalCustomEmail" data-toggle="modal">Compose
                                                Email</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#modalQuickSms" data-toggle="modal">Quick SMS</a>
                                            <a class="dropdown-item" href="#modalCustomSms" data-toggle="modal">Compose
                                                SMS</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Banana</td>
                                    <td>15</td>
                                    <td>Small</td>
                                    <td class="description-td">Testing...</td>
                                    <td>12/02/2020</td>
                                    <td>
                                        <span class="success-circle"></span>
                                        SMS
                                        <span class="tooltiptext">SMS has been sand</span>
                                    </td>
                                    <td class="position-relative">
                                        <button class="btn btn-sm dropdown-toggle" type="button" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                            Actions
                                        </button>
                                        <div class="dropdown-menu" x-placement="top-start"
                                             style="position: absolute; transform: translate3d(0px, -165px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <a class="dropdown-item" href="#viewModal" data-toggle="modal">View Details</a>
                                            <a class="dropdown-item" href="customer_details.html">Customer Details</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#modalQuickEmail" data-toggle="modal">Quick
                                                Email</a>
                                            <a class="dropdown-item" href="#modalCustomEmail" data-toggle="modal">Compose
                                                Email</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#modalQuickSms" data-toggle="modal">Quick SMS</a>
                                            <a class="dropdown-item" href="#modalCustomSms" data-toggle="modal">Compose
                                                SMS</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Apple</td>
                                    <td>15</td>
                                    <td>Small</td>
                                    <td class="description-td">Testing...</td>
                                    <td>12/02/2020</td>
                                    <td>
                                        <span class="success-circle"></span>
                                        SMS
                                        <span class="tooltiptext">SMS has been sand</span>
                                    </td>
                                    <td class="position-relative">
                                        <button class="btn btn-sm dropdown-toggle" type="button" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                            Actions
                                        </button>
                                        <div class="dropdown-menu" x-placement="top-start"
                                             style="position: absolute; transform: translate3d(0px, -165px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <a class="dropdown-item" href="#viewModal" data-toggle="modal">View Details</a>
                                            <a class="dropdown-item" href="customer_details.html">Customer Details</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#modalQuickEmail" data-toggle="modal">Quick
                                                Email</a>
                                            <a class="dropdown-item" href="#modalCustomEmail" data-toggle="modal">Compose
                                                Email</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#modalQuickSms" data-toggle="modal">Quick SMS</a>
                                            <a class="dropdown-item" href="#modalCustomSms" data-toggle="modal">Compose
                                                SMS</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Orange</td>
                                    <td>15</td>
                                    <td>Small</td>
                                    <td class="description-td">Testing...</td>
                                    <td>12/02/2020</td>
                                    <td>
                                        <span class="success-circle"></span>
                                        Email
                                        <span class="tooltiptext">Email has been sand</span>
                                    </td>
                                    <td class="position-relative">
                                        <button class="btn btn-sm dropdown-toggle" type="button" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                            Actions
                                        </button>
                                        <div class="dropdown-menu" x-placement="top-start"
                                             style="position: absolute; transform: translate3d(0px, -165px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <a class="dropdown-item" href="#viewModal" data-toggle="modal">View Details</a>
                                            <a class="dropdown-item" href="customer_details.html">Customer Details</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#modalQuickEmail" data-toggle="modal">Quick
                                                Email</a>
                                            <a class="dropdown-item" href="#modalCustomEmail" data-toggle="modal">Compose
                                                Email</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#modalQuickSms" data-toggle="modal">Quick SMS</a>
                                            <a class="dropdown-item" href="#modalCustomSms" data-toggle="modal">Compose
                                                SMS</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Apple</td>
                                    <td>15</td>
                                    <td>Small</td>
                                    <td class="description-td">Testing...</td>
                                    <td>12/02/2020</td>
                                    <td>
                                        <span class="pending-circle"></span>
                                        Email
                                        <span class="tooltiptext">Email has been pending</span>
                                    </td>
                                    <td class="position-relative">
                                        <button class="btn btn-sm dropdown-toggle" type="button" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                            Actions
                                        </button>
                                        <div class="dropdown-menu" x-placement="top-start"
                                             style="position: absolute; transform: translate3d(0px, -165px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <a class="dropdown-item" href="#viewModal" data-toggle="modal">View Details</a>
                                            <a class="dropdown-item" href="customer_details.html">Customer Details</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#modalQuickEmail" data-toggle="modal">Quick
                                                Email</a>
                                            <a class="dropdown-item" href="#modalCustomEmail" data-toggle="modal">Compose
                                                Email</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#modalQuickSms" data-toggle="modal">Quick SMS</a>
                                            <a class="dropdown-item" href="#modalCustomSms" data-toggle="modal">Compose
                                                SMS</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Apple</td>
                                    <td>15</td>
                                    <td>Small</td>
                                    <td class="description-td">Testing...</td>
                                    <td>12/02/2020</td>
                                    <td>
                                        <span class="pending-circle"></span>
                                        SMS
                                        <span class="tooltiptext">SMS has been pending</span>
                                    </td>
                                    <td class="position-relative">
                                        <button class="btn btn-sm dropdown-toggle" type="button" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                            Actions
                                        </button>
                                        <div class="dropdown-menu" x-placement="top-start"
                                             style="position: absolute; transform: translate3d(0px, -165px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <a class="dropdown-item" href="#viewModal" data-toggle="modal">View Details</a>
                                            <a class="dropdown-item" href="customer_details.html">Customer Details</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#modalQuickEmail" data-toggle="modal">Quick
                                                Email</a>
                                            <a class="dropdown-item" href="#modalCustomEmail" data-toggle="modal">Compose
                                                Email</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#modalQuickSms" data-toggle="modal">Quick SMS</a>
                                            <a class="dropdown-item" href="#modalCustomSms" data-toggle="modal">Compose
                                                SMS</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Apple</td>
                                    <td>15</td>
                                    <td>Small</td>
                                    <td class="description-td">Testing...</td>
                                    <td>12/02/2020</td>
                                    <td>
                                        <span class="pending-circle"></span>
                                        Email
                                        <span class="tooltiptext">Email has been pending</span>
                                    </td>
                                    <td class="position-relative">
                                        <button class="btn btn-sm dropdown-toggle" type="button" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                            Actions
                                        </button>
                                        <div class="dropdown-menu" x-placement="top-start"
                                             style="position: absolute; transform: translate3d(0px, -165px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <a class="dropdown-item" href="#viewModal" data-toggle="modal">View Details</a>
                                            <a class="dropdown-item" href="customer_details.html">Customer Details</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#modalQuickEmail" data-toggle="modal">Quick
                                                Email</a>
                                            <a class="dropdown-item" href="#modalCustomEmail" data-toggle="modal">Compose
                                                Email</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#modalQuickSms" data-toggle="modal">Quick SMS</a>
                                            <a class="dropdown-item" href="#modalCustomSms" data-toggle="modal">Compose
                                                SMS</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Apple</td>
                                    <td>15</td>
                                    <td>Small</td>
                                    <td class="description-td">Testing...</td>
                                    <td>12/02/2020</td>
                                    <td>
                                        <span class="pending-circle"></span>
                                        Email
                                        <span class="tooltiptext">Email has been pending</span>
                                    </td>
                                    <td class="position-relative">
                                        <button class="btn btn-sm dropdown-toggle" type="button" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                            Actions
                                        </button>
                                        <div class="dropdown-menu" x-placement="top-start"
                                             style="position: absolute; transform: translate3d(0px, -165px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <a class="dropdown-item" href="#viewModal" data-toggle="modal">View Details</a>
                                            <a class="dropdown-item" href="customer_details.html">Customer Details</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#modalQuickEmail" data-toggle="modal">Quick
                                                Email</a>
                                            <a class="dropdown-item" href="#modalCustomEmail" data-toggle="modal">Compose
                                                Email</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#modalQuickSms" data-toggle="modal">Quick SMS</a>
                                            <a class="dropdown-item" href="#modalCustomSms" data-toggle="modal">Compose
                                                SMS</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Apple</td>
                                    <td>15</td>
                                    <td>Small</td>
                                    <td class="description-td">Testing...</td>
                                    <td>12/02/2020</td>
                                    <td>
                                        <span class="pending-circle"></span>
                                        SMS
                                        <span class="tooltiptext">SMS has been pending</span>
                                    </td>
                                    <td class="position-relative">
                                        <button class="btn btn-sm dropdown-toggle" type="button" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                            Actions
                                        </button>
                                        <div class="dropdown-menu" x-placement="top-start"
                                             style="position: absolute; transform: translate3d(0px, -165px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <a class="dropdown-item" href="#viewModal" data-toggle="modal">View Details</a>
                                            <a class="dropdown-item" href="customer_details.html">Customer Details</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#modalQuickEmail" data-toggle="modal">Quick
                                                Email</a>
                                            <a class="dropdown-item" href="#modalCustomEmail" data-toggle="modal">Compose
                                                Email</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#modalQuickSms" data-toggle="modal">Quick SMS</a>
                                            <a class="dropdown-item" href="#modalCustomSms" data-toggle="modal">Compose
                                                SMS</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Apple</td>
                                    <td>15</td>
                                    <td>Small</td>
                                    <td class="description-td">Testing...</td>
                                    <td>12/02/2020</td>
                                    <td>
                                        <span class="pending-circle"></span>
                                        SMS
                                        <span class="tooltiptext">SMS has been pending</span>
                                    </td>
                                    <td class="position-relative">
                                        <button class="btn btn-sm dropdown-toggle" type="button" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                            Actions
                                        </button>
                                        <div class="dropdown-menu" x-placement="top-start"
                                             style="position: absolute; transform: translate3d(0px, -165px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <a class="dropdown-item" href="#viewModal" data-toggle="modal">View Details</a>
                                            <a class="dropdown-item" href="customer_details.html">Customer Details</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#modalQuickEmail" data-toggle="modal">Quick
                                                Email</a>
                                            <a class="dropdown-item" href="#modalCustomEmail" data-toggle="modal">Compose
                                                Email</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#modalQuickSms" data-toggle="modal">Quick SMS</a>
                                            <a class="dropdown-item" href="#modalCustomSms" data-toggle="modal">Compose
                                                SMS</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Apple</td>
                                    <td>15</td>
                                    <td>Small</td>
                                    <td class="description-td">Testing...</td>
                                    <td>12/02/2020</td>
                                    <td>
                                        <span class="pending-circle"></span>
                                        Email
                                        <span class="tooltiptext">Email has been pending</span>
                                    </td>
                                    <td class="position-relative">
                                        <button class="btn btn-sm dropdown-toggle" type="button" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                            Actions
                                        </button>
                                        <div class="dropdown-menu" x-placement="top-start"
                                             style="position: absolute; transform: translate3d(0px, -165px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <a class="dropdown-item" href="#viewModal" data-toggle="modal">View Details</a>
                                            <a class="dropdown-item" href="customer_details.html">Customer Details</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#modalQuickEmail" data-toggle="modal">Quick
                                                Email</a>
                                            <a class="dropdown-item" href="#modalCustomEmail" data-toggle="modal">Compose
                                                Email</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#modalQuickSms" data-toggle="modal">Quick SMS</a>
                                            <a class="dropdown-item" href="#modalCustomSms" data-toggle="modal">Compose
                                                SMS</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Apple</td>
                                    <td>15</td>
                                    <td>Small</td>
                                    <td class="description-td">Testing...</td>
                                    <td>12/02/2020</td>
                                    <td>
                                        <span class="pending-circle"></span>
                                        Email
                                        <span class="tooltiptext">Email has been pending</span>
                                    </td>
                                    <td class="position-relative">
                                        <button class="btn btn-sm dropdown-toggle" type="button" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                            Actions
                                        </button>
                                        <div class="dropdown-menu" x-placement="top-start"
                                             style="position: absolute; transform: translate3d(0px, -165px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <a class="dropdown-item" href="#viewModal" data-toggle="modal">View Details</a>
                                            <a class="dropdown-item" href="customer_details.html">Customer Details</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#modalQuickEmail" data-toggle="modal">Quick
                                                Email</a>
                                            <a class="dropdown-item" href="#modalCustomEmail" data-toggle="modal">Compose
                                                Email</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#modalQuickSms" data-toggle="modal">Quick SMS</a>
                                            <a class="dropdown-item" href="#modalCustomSms" data-toggle="modal">Compose
                                                SMS</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Apple</td>
                                    <td>15</td>
                                    <td>Small</td>
                                    <td class="description-td">Testing...</td>
                                    <td>12/02/2020</td>
                                    <td>
                                        <span class="pending-circle"></span>
                                        SMS
                                        <span class="tooltiptext">SMS has been pending</span>
                                    </td>
                                    <td class="position-relative">
                                        <button class="btn btn-sm dropdown-toggle" type="button" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                            Actions
                                        </button>
                                        <div class="dropdown-menu" x-placement="top-start"
                                             style="position: absolute; transform: translate3d(0px, -165px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <a class="dropdown-item" href="#viewModal" data-toggle="modal">View Details</a>
                                            <a class="dropdown-item" href="customer_details.html">Customer Details</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#modalQuickEmail" data-toggle="modal">Quick
                                                Email</a>
                                            <a class="dropdown-item" href="#modalCustomEmail" data-toggle="modal">Compose
                                                Email</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#modalQuickSms" data-toggle="modal">Quick SMS</a>
                                            <a class="dropdown-item" href="#modalCustomSms" data-toggle="modal">Compose
                                                SMS</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Apple</td>
                                    <td>15</td>
                                    <td>Small</td>
                                    <td class="description-td">Testing...</td>
                                    <td>12/02/2020</td>
                                    <td>
                                        <span class="pending-circle"></span>
                                        SMS
                                        <span class="tooltiptext">SMS has been pending</span>
                                    </td>
                                    <td class="position-relative">
                                        <button class="btn btn-sm dropdown-toggle" type="button" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                            Actions
                                        </button>
                                        <div class="dropdown-menu" x-placement="top-start"
                                             style="position: absolute; transform: translate3d(0px, -165px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <a class="dropdown-item" href="#viewModal" data-toggle="modal">View Details</a>
                                            <a class="dropdown-item" href="customer_details.html">Customer Details</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#modalQuickEmail" data-toggle="modal">Quick
                                                Email</a>
                                            <a class="dropdown-item" href="#modalCustomEmail" data-toggle="modal">Compose
                                                Email</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#modalQuickSms" data-toggle="modal">Quick SMS</a>
                                            <a class="dropdown-item" href="#modalCustomSms" data-toggle="modal">Compose
                                                SMS</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Apple</td>
                                    <td>15</td>
                                    <td>Small</td>
                                    <td class="description-td">Testing...</td>
                                    <td>12/02/2020</td>
                                    <td>
                                        <span class="pending-circle"></span>
                                        Email
                                        <span class="tooltiptext">Email has been pending</span>
                                    </td>
                                    <td class="position-relative">
                                        <button class="btn btn-sm dropdown-toggle" type="button" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                            Actions
                                        </button>
                                        <div class="dropdown-menu" x-placement="top-start"
                                             style="position: absolute; transform: translate3d(0px, -165px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <a class="dropdown-item" href="#viewModal" data-toggle="modal">View Details</a>
                                            <a class="dropdown-item" href="customer_details.html">Customer Details</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#modalQuickEmail" data-toggle="modal">Quick
                                                Email</a>
                                            <a class="dropdown-item" href="#modalCustomEmail" data-toggle="modal">Compose
                                                Email</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#modalQuickSms" data-toggle="modal">Quick SMS</a>
                                            <a class="dropdown-item" href="#modalCustomSms" data-toggle="modal">Compose
                                                SMS</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Apple</td>
                                    <td>15</td>
                                    <td>Small</td>
                                    <td class="description-td">Testing...</td>
                                    <td>12/02/2020</td>
                                    <td>
                                        <span class="pending-circle"></span>
                                        SMS
                                        <span class="tooltiptext">SMS has been pending</span>
                                    </td>
                                    <td class="position-relative">
                                        <button class="btn btn-sm dropdown-toggle" type="button" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                            Actions
                                        </button>
                                        <div class="dropdown-menu" x-placement="top-start"
                                             style="position: absolute; transform: translate3d(0px, -165px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <a class="dropdown-item" href="#viewModal" data-toggle="modal">View Details</a>
                                            <a class="dropdown-item" href="customer_details.html">Customer Details</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#modalQuickEmail" data-toggle="modal">Quick
                                                Email</a>
                                            <a class="dropdown-item" href="#modalCustomEmail" data-toggle="modal">Compose
                                                Email</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#modalQuickSms" data-toggle="modal">Quick SMS</a>
                                            <a class="dropdown-item" href="#modalCustomSms" data-toggle="modal">Compose
                                                SMS</a>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- container -->
        </div><!-- content-body -->
    </div><!-- content -->
@endsection
