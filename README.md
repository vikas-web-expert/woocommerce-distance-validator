# WooCommerce Custom Distance Validator 🚀

A custom lightweight PHP function for WooCommerce that intercepts the checkout process and calculates the distance between the store and the customer's delivery address. 

## 📌 Problem Solved
Standard shipping plugins often lack precise distance-based restrictions (like a strict 15-mile radius). This script hooks directly into the `woocommerce_checkout_process` to validate the customer's location before payment is processed, which is crucial for local delivery businesses, perishable goods, or high-risk local industries.

## 🛠️ Tech Stack
* **PHP 8+**
* **WordPress Core API**
* **WooCommerce Action Hooks** (`woocommerce_checkout_process`)

## 💡 How it Works
1. Captures the user's input (Billing/Shipping Zip Code) at checkout.
2. Connects to a Distance Matrix logic (prepared for Google Maps API).
3. If the distance exceeds the pre-defined maximum limit (e.g., 15 miles), it fires a `wc_add_notice` error.
4. The checkout process is completely halted, preventing out-of-zone orders.

---
*Developed by Vikas - Custom PHP & WordPress Expert*
