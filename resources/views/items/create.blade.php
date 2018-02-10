@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-12 blog-main">

            <div class="" ng-app="myApp" ng-controller="myCtrl">
                <form method="POST" action="/bill-items-all">

                    {{csrf_field()}}

                    <input type="hidden" name="bill_id" value="{{$bill_id}}">
                    {{--
                    <select name="{{$stock_field['name']}}" class="form-control @if(isset($stock_field['class'])){{$stock_field['class']}}@endif" id="@if(isset($stock_field['id'])){{$stock_field['id']}}@endif">
                        @foreach($stock_field['options'] as $value => $label)
                            <option @if($stock_field['value'] == $value) selected @endif value="{{$value}}">{{$label}}</option>
                        @endforeach
                    </select>--}}
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Item ID</th>
                            <th>Stock ID</th>
                            <th>Quantity</th>
                            <th>Rate</th>
                            <th>Discount</th>
                            <th>GST</th>
                            <th>Amount</th>
                        </tr>
                        </thead>

                        <tbody>

                        {{--<% stock_items %>--}}
                        <tr ng-repeat="item in items">
                            <td scope="row"><% $index+1 %></td>
                            <td>
                            <ui-select ng-model="item.stock_id" theme="selectize" style="width: 300px;" title="Choose Item">
                                <ui-select-match placeholder="Select or search a item in the list..."><% $select.selected.name %></ui-select-match>
                                <ui-select-choices repeat="country in countries | filter: $select.search">
                                    <span ng-bind-html="country.name | highlight: $select.search"></span>
                                    <small ng-bind-html="country.code | highlight: $select.search"></small>
                                </ui-select-choices>
                            </ui-select>
                                <p><% item.stock_id %></p>
                            </td>
                         {{--  <td><select ng-model="item.stock_id" ng-options="stock_id in stock_items"    name="{{$stock_field['name']}}" class="form-control @if(isset($stock_field['class'])){{$stock_field['class']}}@endif" id="@if(isset($stock_field['id'])){{$stock_field['id']}}@endif">
                                    @foreach($stock_field['options'] as $value => $label)
                                        <option @if($stock_field['value'] == $value) selected @endif value="{{$value}}">{{$label}}</option>
                                    @endforeach
                                </select></td>--}}
                            {{--<td><select name="stock_id[]">
                                    <option ng-repeat="x in stock_items" value="<% x.id %>"><% x.name %></option>
                                </select></td>--}}
                            <td><input type="number" ng-required="item.stock_id.code || $index == 0" class="form-control" max="<% item.stock_id.available %>" ng-model="item.quantity" name="quantity[]" aria-describedby="helpId" placeholder=""></td>
                            <td><input type="number" ng-required="item.stock_id.code" class="form-control" step="0.50" max="<% item.stock_id.mrp %>" ng-model="item.rate" name="rate[]" aria-describedby="helpId" placeholder=""></td>
                            <td><input type="number" class="form-control" max="100" ng-model="item.discount" name="discount[]" aria-describedby="helpId" placeholder=""></td>
                            <td>{{--<input type="text" class="form-control" ng-model="item.gst" name="gst[]" aria-describedby="helpId" placeholder="" value="<% item.stock_id.gst %>"><% item.stock_id.gst %>--}}
                            </td>
                            <td> <% item.stock_id.gst %><input type="hidden" value=" <% item.stock_id.gst %>" name="gst[]"></td>
                            <td><%  famount(item)  %><input type="hidden" value="<% item.amount %>" name="amount[]"></td>
                            <td>
                                <a name="" ng-click="add()" id="" class="btn btn-primary" href="#" role="button">+</a>
                            </td>
                            <td>
                                <a name="" ng-click="remove($index)" id="" class="btn btn-primary" href="#" role="button" ng-hide="$index == 0">-</a>
                            </td>
                            <td><% item.gst_val %></td>
                        </tr>

                        </tbody>

                    </table>



                        CGST:<input type="text" value="<% cgst() %>" name="cgst_amount"><% cgst() %><br>
                        SGST: <input type="hidden" value="" name="sgst_amount"> <% cgst() %><br>
                        Total Amount:<input type="hidden" value="" name="total_amount"><% tamount() %>

                         <input type="submit"/>

                </form>


            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular-sanitize.js"></script>
            <script src="/js/select.js"></script>
            <link rel="stylesheet" href="/css/select.css">
            <script>
                var app = angular.module("myApp", ['ngSanitize', 'ui.select'], function ($interpolateProvider) {
                    $interpolateProvider.startSymbol('<%');
                    $interpolateProvider.endSymbol('%>');
                });

                app.controller("myCtrl", function ($scope) {
                    /*$scope.records = [
                        "Alfreds Futterkiste",
                        "Berglunds snabbköp",
                        "Centro comercial Moctezuma",
                        "Ernst Handel",
                        "Ernst Handel1",
                        "Ernst Handel2",
                    ]*/

                    var object = {
                        "stock_id": "",
                        "quantity": "",
                        "rate": "",
                        "discount": "",
                        "gst": "",
                        "amount": ""
                    };
                    $scope.parseInt = parseInt;

                    $scope.add = function () {
                        $scope.items.push(object);
                    }
                    $scope.remove = function (index) {
                        $scope.items.splice(index, 1);
                    }

                    $scope.items = [
                        {
                            "stock_id": {"available": 0, "mrp": 0},
                            "quantity": "",
                            "rate": "",
                            "discount": "",
                            "gst": "",
                            "amount": "",
                        },
                        {
                            "stock_id": "",
                            "quantity": "",
                            "rate": "",
                            "discount": "",
                            "gst": "",
                            "amount": ""
                        },
                        {
                            "stock_id": "",
                            "quantity": "",
                            "rate": "",
                            "discount": "",
                            "gst": "",
                            "amount": ""
                        },
                        {
                            "stock_id": "",
                            "quantity": "",
                            "rate": "",
                            "discount": "",
                            "gst": "",
                            "amount": ""
                        },
                        {
                            "stock_id": "",
                            "quantity": "",
                            "rate": "",
                            "discount": "",
                            "gst": "",
                            "amount": ""
                        }
                    ];

                    $scope.cgst = 0;

                    $scope.country = {};
                    $scope.countries = JSON.parse('<?php echo addslashes(json_encode($stock_field['options'])); ?>');


                    /*@todo trigger this on angular ready */
                    /*$scope.items.push(object);
                    $scope.items.push(object);
                    $scope.items.push(object);
                    $scope.items.push(object);
                    $scope.items.push(object);*/

                    $scope.famount = function (item) {
                        var output = 0;
                        if (item.quantity && item.rate) {
                            output = item.quantity * item.rate;
                        }

                        if (item.discount) {

                            var discount = Math.round(output * item.discount) / 100;
                            output = output - discount;
                        }

                        var gst = 0;
                        if (item.stock_id.gst) {

                            gst = Math.round(output * item.stock_id.gst) / 100;
                            output = output + gst;


                        }

                        item.gst_val = gst;

                        item.amount = output;

                        return output;
                    }

                   $scope.cgst = function () {
                        var output = 0;
                        var items = $scope.items;

                        for(i in items){
                            if(typeof items[i].gst_val != "undefined") {
                                output += items[i].gst_val;
                            }
                        }
                        //item.cgst = output;

                        output = output / 2;
                        return output;
                    }

                    $scope.tamount=function(){

                        var output=0;
                        var items=$scope.items;


                        for(i in items){
                            output += items[i].amount;

                        }
                        return output;
                    }





                });
            </script>
        </div>
    </div>
@endsection()