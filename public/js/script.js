//BUY PAGE JS
function deleteItem(itemId) {
    // Confirm with the user before proceeding with the deletion
    if (confirm("Are you sure you want to delete this item?")) {
      // Redirect to the same page with action=delete and item_id parameter
      window.location.href = "buy.php?action=delete&item_id=" + itemId;
    }
  }
  
  // REQUEST PAGE JS
  function deleterequest(requestId) {
    // Confirm with the user before proceeding with the deletion
    if (confirm("Are you sure you want to delete this request?")) {
      // Redirect to the same page with action=delete and request_id parameter
      window.location.href =
        "get_request.php?action=delete&request_id=" + requestId;
    }
  }
  function openModal() {
    document.getElementById("uploadModal").style.display = "block";
  }
  
  function closeModal() {
    document.getElementById("uploadModal").style.display = "none";
  }
  
  function submitRequest() {
    var form = document.getElementById("requestForm");
    var formData = new FormData(form);
  
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "php_BackEnd/list_request.php", true);
    xhr.onload = function () {
      if (xhr.status === 200) {
        // Request successful
        // You can update UI or take any other action here
        alert("Request submitted successfully!");
        // Close the modal
        closeModal();
        // Reload the page to reflect the updated data
        location.reload();
      } else {
        // Request failed
        alert("Failed to submit request. Please try again.");
      }
    };
    xhr.send(formData);
  
    // Prevent the default form submission
    event.preventDefault();
  }
  