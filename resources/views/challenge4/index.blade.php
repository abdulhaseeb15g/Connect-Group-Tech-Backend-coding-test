<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grouped Owners</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h1>Grouped Owners</h1>

    <!-- Fixed array -->
<?php
$files = [
    "insurance.txt" => "Company A",
    "letter.docx" => "Company A",
    "Contract.docx" => "Company B",
];

// Get unique owner names
$uniqueOwners = array_unique(array_values($files));
?>

<!-- Form to input file names and owners -->
    <form id="fileForm">
        <div class="form-group">
            <label for="fileName">File Name:</label>
            <input type="text" class="form-control" id="fileName" placeholder="Enter file name">
        </div>
        <div class="form-group">
            <label for="ownerName">Owner Name:</label>
            <select class="form-control" id="ownerName">
                @foreach ($uniqueOwners as $owner)
                    <option value="{{ $owner }}">{{ $owner }}</option>
                @endforeach
            </select>
        </div>
        <button type="button" class="btn btn-primary" onclick="addFile()">Add File</button>
    </form>

    <div class="row mt-4" id="ownerCards">
        @foreach ($result as $owner => $files)
            <div class="col-md-6" id="{{str_replace(' ','-',$owner )}}">
                <div class="card mb-4">
                    <div class="card-header">
                        <strong>{{ $owner }}</strong>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($files as $file)
                                <li class="list-group-item">{{ $file }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
</div>

<!-- Include Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    // JavaScript function to add file to the list
    function addFile() {
        var fileName = document.getElementById("fileName").value;
        var ownerName = document.getElementById("ownerName").value;

        if (fileName && ownerName) {
            // Check if card for owner exists, create if not
            var ownerCardId = ownerName.replace(/\s+/g, '-'); // Convert spaces to hyphens for element ID
            var ownerCard = document.getElementById(ownerCardId);

            if (!ownerCard) {
                ownerCard = document.createElement("div");
                ownerCard.className = "col-md-6";
                ownerCard.id = ownerCardId;

                var cardHeader = document.createElement("div");
                cardHeader.className = "card mb-4";
                cardHeader.innerHTML = '<div class="card-header"><strong>' + ownerName + '</strong></div>';

                var cardBody = document.createElement("div");
                cardBody.className = "card-body";
                cardBody.innerHTML = '<ul class="list-group"></ul>';

                ownerCard.appendChild(cardHeader);
                ownerCard.appendChild(cardBody);

                document.getElementById("ownerCards").appendChild(ownerCard);
            }

            // Add file to the list of the corresponding owner
            var list = document.createElement("li");
            list.className = "list-group-item";
            list.appendChild(document.createTextNode(fileName));

            var ul = ownerCard.querySelector(".list-group");
            ul.appendChild(list);

            // Clear input fields
            document.getElementById("fileName").value = "";
        }
    }
</script>

</body>
</html>
