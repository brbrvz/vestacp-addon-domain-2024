# VestaCP Addon Domain Script

## Introduction

This script automates updating domain configurations in Vesta Control Panel (Vestacp), making it easier to addon domains

<img src="https://i.imgur.com/2yGNvHb.png" width="600">

## Usage

1. **Access your Vestacp using root via SSH**

    Ensure you have SSH access to your server with root privileges.

2. **Put this script in the /home/admin/conf/web**

    Place the `addon.php` script in the `/home/admin/conf/web` directory on your server.

3. **Run this script `php addon.php`**

    Execute the script `addon.php` using PHP. This script will update the domain configurations based on the settings specified within.

4. **Restart Apache**

    Depending on your server's operating system, restart Apache to apply the changes:

    - For CentOS 7:
      ```bash
      sudo systemctl restart httpd.service
      ```

    - For Ubuntu:
      ```bash
      sudo systemctl restart apache2
      ```

## Important Note
Before executing the script, back up all `.conf` files in the `/home/user/conf/web` directory. This precautionary measure helps prevent any potential data loss or unexpected outcomes due to misconfigurations.

Feel free to reach out if you encounter any issues or have any questions!
