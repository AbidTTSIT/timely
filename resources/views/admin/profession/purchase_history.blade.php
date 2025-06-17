@extends('admin.layouts.master')
@section('content')
    {{-- <div class="content-wrapper">
        <div class="content">

            <!-- Products Inventory -->
            <div class="card card-default">
                <div class="card-header">
                    <h2>Purchase History</h2>

                    <a class="btn mdi mdi-code-tags" data-toggle="collapse" href="#collapse-data-tables" role="button"
                        aria-expanded="false" aria-controls="collapse-data-tables">
                    </a>
                </div>
                <div class="card-body">
                    <div class="collapse" id="collapse-data-tables">
                        <pre class="language-html mb-4"></pre>
                    </div>
                    <table id="productsTable" class="table table-hover table-product" style="width: 100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Qty</th>
                                <th>Variants</th>
                                <th>Committed</th>
                                <th>User Activity</th>
                                <th>Sold</th>
                                <th>In Stock</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>24541</td>
                                <td>27</td>
                                <td>1</td>
                                <td>2</td>
                                <td>
                                    <div id="tbl-chart-01"></div>
                                </td>
                                <td>4</td>
                                <td>18</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle icon-burger-mini" href="#" role="button"
                                            id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false" data-display="static">
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
