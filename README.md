<p align="center"><img src="http://alisiba.com/voucher_si2.gif" width="900" alt="voucher Gif">
</p>

<p align="center"><img src="http://alisiba.com/voucher_si.gif" width="900" alt="voucher Gif">
</p>

## Update
- Two attributes related to validity were added to *Vouchers* : ``` valid_from and valid_to```
- Based on validity date, calculated attribute  ```Status``` will determine whether this Voucher is currently active or not
- A new page where only active Vouchers are listed was added.
- Pagination was added to the new active vouchers page.


## Vouchers full stack app

This is a full stack demonstration of a **Vouchers** system where user is able to create,read, update and delete a Voucher.
A voucher has three attributes: 
- Name : string.
- Code : unique string.
- Discount : float number with values between 0-100.

Validation was applied for the above attributes.

Backend API was implemented by Laravel, Frontend api consumer by VueJs 3.

## Possible enhancements:
- Paginate Voucher list.
- Authenticate User.
- Link Vouchers to a Company/Store.
- Add more attributes to a Voucher such as : validity(years, days, or from-to date) and allowed number of usages.

