const amounts = document.querySelectorAll(".amount");

amounts.forEach((nAmount) => {
  let amount = parseFloat(nAmount.textContent);

  amount =
    amount == 0 || amount == null || typeof amount !== "number" ? 0 : amount;

  amount = amount.toLocaleString("en-NG", {
    style: "currency",
    currency: "NGN",
  });

  nAmount.textContent = amount;
});
