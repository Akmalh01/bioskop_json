function searchData() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.querySelector("table");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1]; // Adjust index based on which column to search
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
    // Show reset button
    document.getElementById("resetButton").style.display = "block";
    // Hide search results container
    document.getElementById("searchResults").style.display = "none";
}

function resetSearch() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInput");
    input.value = ""; // Clear search input
    table = document.querySelector("table");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        tr[i].style.display = ""; // Reset table row display
    }
    // Hide reset button
    document.getElementById("resetButton").style.display = "none";
    // Hide search results container
    document.getElementById("searchResults").style.display = "none";
}