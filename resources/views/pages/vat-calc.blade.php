@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome, {{ auth()->user()->name }}!</h1>
    </div>

    <div class="row justify-content-center vertical-center">
        <div class="col-md-6 center-div">
            <h2>Calculate Vat</h2>
            <br>
            <div class="form-group">
                <label for="total">Gross Total</label>
                <input type="number" class="form-control" id="total" placeholder="Enter gross total">
            </div>
            <div class="form-group">
                <label>Operation</label>
                <select id="operation" class="form-select" aria-label="Default select example">
                <option selected>Select an option</option>
                <option value="1">Include Vat To Total</option>
                <option value="2">Exclude Vat From Total</option>
                </select>
            </div>
            <br>
            <button onclick="calculateVat()" class="btn btn-primary">Calculate</button>
            <br>
            <h4 id="result" class="alert alert-info mt-4 d-none "></h4>
        </div>
    </div>

    <script>

        function calculateVat() {
            let total = Number(document.getElementById("total").value)
            let operation = Number(document.getElementById("operation").value)

            if(total === 0) {
                return alert("Please enter a valid amount.")
            }

            let vat = total * (15/100)

            if (operation === 1) {
                let netTotal = total + vat

                document.getElementById('result').innerText = `Net Total (VAT Included) : ${netTotal}`
                document.getElementById('result').classList.remove('d-none')
            } else if (operation === 2) {
                let netTotal = Math.round(((total/1.15) - total) * (-1))

                document.getElementById('result').innerText = `VAT : ${netTotal}`
                document.getElementById('result').classList.remove('d-none')
            } else {
                alert("Please select an operation for calculating vat.")
            }
        }

    </script>

@endsection
