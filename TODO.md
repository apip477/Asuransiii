# TODO: Modify Produk View to Display Layanan Data

## Tasks
- [ ] Modify routes/web.php to fetch layanan data for /produk route
- [ ] Update resources/views/produk.blade.php to display layanan (photo, name, description)
- [ ] Test the changes

## Information Gathered
- produk.blade.php currently shows static pricing packages
- Layanan model has name, description, image fields
- Admin layanan controller manages layanan data
- Route for /produk is a simple view return

## Plan
- Change /produk route to fetch all layanan and pass to view
- Add a new section in produk.blade.php to display layanan data in cards or grid
- Use asset('storage/' . $layanan->image) for images

## Dependent Files
- routes/web.php
- resources/views/produk.blade.php

## Followup Steps
- [x] Run the application and check /produk page
