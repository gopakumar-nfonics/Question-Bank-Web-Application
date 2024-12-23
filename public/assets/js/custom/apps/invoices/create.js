"use strict";

var KTAppInvoicesCreate = function () {

    var e;

    // Function to update total price and grand total
    var t = function () {
        var t = [].slice.call(e.querySelectorAll('[data-kt-element="items"] [data-kt-element="item"]')),
            a = 0,
            n = wNumb({ decimals: 2, thousand: "," });

        // Loop through each item and calculate totals
        t.map(function (e) {
            var t = e.querySelector('[data-kt-element="quantity"]'),
                l = e.querySelector('[data-kt-element="price"]'),
                r = n.from(l.value);
            r = !r || r < 0 ? 0 : r;
            var i = parseInt(t.value);
            i = !i || i < 0 ? 1 : i;

            // Update item total and grand total
            l.value = n.to(r);
            t.value = i;
            e.querySelector('[data-kt-element="total"]').innerText = n.to(r * i);
            a += r * i;
        });

        // Update subtotal and grand total on the invoice form
        e.querySelector('[data-kt-element="sub-total"]').innerText = n.to(a);
        e.querySelector('[data-kt-element="grand-total"]').innerText = n.to(a);
    };

    // Function to handle empty item template
    var a = function () {
        if (e.querySelectorAll('[data-kt-element="items"] [data-kt-element="item"]').length === 0) {
            var t = e.querySelector('[data-kt-element="empty-template"] tr').cloneNode(true);
            e.querySelector('[data-kt-element="items"] tbody').appendChild(t);
        } else {
            KTUtil.remove(e.querySelector('[data-kt-element="items"] [data-kt-element="empty"]'));
        }
    };

    // Function to clear fields of the cloned item
    var clearFields = function (itemElement) {
        itemElement.querySelectorAll("input").forEach(function (input) {
            input.value = ""; // Clear input values
        });
    };

    return {
        init: function (n) {
            // Get the invoice form element
            e = document.querySelector("#kt_invoice_form");

            // Add new item on "Add Item" button click
            e.querySelector('[data-kt-element="items"] [data-kt-element="add-item"]').addEventListener("click", function (n) {
                n.preventDefault();
                var l = e.querySelector('[data-kt-element="item-template"] tr').cloneNode(true);
                e.querySelector('[data-kt-element="items"] tbody').appendChild(l);
                clearFields(l); // Clear the cloned item's fields
                a();
                t();
            });

            // Remove item on "Remove Item" button click
            KTUtil.on(e, '[data-kt-element="items"] [data-kt-element="remove-item"]', "click", function (e) {
                e.preventDefault();
                KTUtil.remove(this.closest('[data-kt-element="item"]'));
                a();
                t();
            });

            // Handle quantity and price change event
            KTUtil.on(e, '[data-kt-element="items"] [data-kt-element="quantity"], [data-kt-element="items"] [data-kt-element="price"]', "change", function (e) {
                e.preventDefault();
                t();
            });

            // Initialize flatpickr for invoice date
            $(e.querySelector('[name="invoice_date"]')).flatpickr({
                enableTime: false,
                dateFormat: "d, M Y"
            });

            // Initialize flatpickr for invoice due date
            $(e.querySelector('[name="invoice_due_date"]')).flatpickr({
                enableTime: false,
                dateFormat: "d, M Y"
            });

            // Call the function to set initial totals
            t();
        }
    };

}();

// Initialize the invoice form after the DOM is loaded
KTUtil.onDOMContentLoaded(function () {
    KTAppInvoicesCreate.init();
});
