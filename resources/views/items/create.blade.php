@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-12 blog-main">

            <div class="" ng-app="myApp" ng-controller="myCtrl">
                <form method="POST" action="/bill-items-all">

                    {{csrf_field()}}
                    <input type="hidden" name="bill_id" value="{{$bill_id}}">
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

                        <tr ng-repeat="item in items">
                            <td scope="row"><% $index+1 %></td>
                            <td><input type="text" class="form-control" ng-model="item.stock_id" name="stock_id[]" aria-describedby="helpId" placeholder=""></td>
                            <td><input type="text" class="form-control" ng-model="item.quantity" name="quantity[]" aria-describedby="helpId" placeholder=""></td>
                            <td><input type="text" class="form-control" ng-model="item.rate" name="rate[]" aria-describedby="helpId" placeholder=""></td>
                            <td><input type="text" class="form-control" ng-model="item.discount" name="discount[]" aria-describedby="helpId" placeholder=""></td>
                            <td><input type="text" class="form-control" ng-model="item.gst" name="gst[]" aria-describedby="helpId" placeholder=""></td>
                            <td><%  famount(item)  %><input type="hidden" value="<% famount(item) %>" name="amount[]"></td>
                            <td>
                                <a name="" ng-click="add()" id="" class="btn btn-primary" href="#" role="button">+</a>
                            </td>
                            <td>
                                <a name="" ng-click="remove($index)" id="" class="btn btn-primary" href="#" role="button" ng-hide="$index == 0">-</a>
                            </td>
                        </tr>

                        </tbody>

                    </table>
                    <input type="submit"/>
                </form>


            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
            <script>
                var app = angular.module("myApp", [], function ($interpolateProvider) {
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

                        if (item.gst) {
                            var gst = Math.round(output * item.gst) / 100;
                            output = output + gst;
                        }

                        return output;
                    }
                    /*$scope.result=function(){
                        $scope.discount= "rate*discount/100";
                        $scope.gst= "rate*gst/100";
                        $scope.amount= "";
                        }*/
                    /*$scope.amount = function(){
                        if($scope.rate-discount){
                             $scope.rate-discount + parseInt($scope.gst);
                        } else {
                            return false;
                        }
                    }*/
                });
            </script>
        </div>
    </div>
@endsection()