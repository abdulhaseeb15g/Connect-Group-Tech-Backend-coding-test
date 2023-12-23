<!-- index.html -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Duplicates Checker</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body class="container mt-5">
<h1 class="mb-4">Array Duplicates Checker</h1>

<!-- User Input Section -->
<div class="mb-3">
    <label for="arrayInput" class="form-label">Enter Numbers (comma-separated): </label>
    <input type="text" class="form-control" id="arrayInput">
</div>

<button class="btn btn-primary" onclick="checkArray()">Check Array</button>

<!-- Result Section -->
<div id="result-container" class="mt-4"></div>

<!-- JavaScript and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script>
    function checkArray() {
        const userInput = document.getElementById('arrayInput').value;
        const arrayValues = userInput.split(',')
            .map(value => parseInt(value.trim(), 10))
            .filter(value => !isNaN(value));

        const count = {};
        for (let i = 0; i < arrayValues.length; i++) {
            const element = arrayValues[i];
            count[element] = (count[element] || 0) + 1;
        }

        const duplicates = [];
        for (const key in count) {
            if (count[key] > 1) {
                duplicates.push(key);
            }
        }

        let resultHTML = '';
        if (duplicates.length > 0) {
            resultHTML += '<p class="alert alert-success">Elements occurring more than once: ' + duplicates.join(', ') + '</p>';
        } else {
            resultHTML += '<p class="alert alert-info">No duplicates found.</p>';
        }

        resultHTML += '<p class="mt-3">Explanation: In the array [' + arrayValues.join(', ') + '], the elements ' + duplicates.join(', ') + ' occur more than once.</p>';

        document.getElementById('result-container').innerHTML = resultHTML;
    }
</script>
</body>
</html>
