</body>
<script src="/shifa1/js/index.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
  const numberInput = document.getElementById("customer_number");
  const numberResult = document.getElementById("number-search-result-list");
  const numberLoader = document.getElementById("number-search-spinner");

  let markup = ``;

  numberInput.addEventListener("keyup", async (e) => {

    markup = '';

    if (e.key == "Tab") {
      numberResult.innerHTML = null;
      markup = '';
      return;
    }

    if (numberInput.value.length >= 2 && numberInput.value.length < 11 && numberInput.value.trim() != "") {
      // Reset the result
      numberLoader.style.display = "block";
      numberResult.innerHTML = null;
      markup = '';

      const {
        data
      } = await axios.get(`http://localhost/shifa1/numbers/search/${numberInput.value}`);

      // HIde the spinner
      numberLoader.style.display = "none";

      if (data.length > 0) {
        data.forEach(el => {
          markup += `<div href="#" class="list-group-item list-group-item-action d-flex justify-content-between"> 
                        <span>${el.name}</span> 
                        <span>${el.contact_number}</span> 
                      </div>`
        });

        // Insert the result list
        numberResult.innerHTML = markup;

        console.log(data);
      } else {
        // Reset the result
        numberResult.innerHTML = "<div>No Data Found</div>";
        markup = '';
        console.log("This is working");
      }



    } else {
      // Reset the result
      numberResult.innerHTML = "<div>No Data Found</div>";
      markup = '';
    }

  });

  numberInput.addEventListener("focus", () => {
    if (numberResult.innerHTML) {
      // Not Null
      numberResult.innerHTML = null;
    } else {
      console.log("how are you?");
    }
  })
</script>

</html>