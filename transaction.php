 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="transaction.css">
</head>
<body>
<div class="main">
    <div class="all">
    <h2>Transactions</h2>
    <form>
    <div class="m">
    <label for="Transactiontype">Transaction Type</label>
    <select id="tranaction">
    <option value="">Select option</option>
    <option value="">Deposit</option>
    <option value="">Withdraw</option>
    <option value="">Transferin</option>
    <option value="">Transferout</option>
    </select>
</div>

    
    <div class="m">
    <label for="sourceaccount">Sourceaccount</label>
    <input type="text" name="sourceaccount">
    </div>
    
    <div class="m">
    <label for="destinationaccount">Destinationaccount</label>
    <input type="text" name="destinationaccount">
    </div>

    <div class="m">
    <label for="amount">Amount</label>
    <input type="text" name="amount">
    </div>

    
    <div class="submit">
    <button type="submit" name="submit">SUBMIT</button>
    </div> 
</div>
</div>
</form>

</body>
</html>