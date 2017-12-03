# billing
Script used to create and send an email with attachment

Steps:

1. Read CSV data from file
2. Create an array of objects with billing information
3. Create an array email message data object from item 2 for per user
4. Create message for each user from item 3 (via swiftmailer)
5. Send message (via swiftmailer)

