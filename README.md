UserPreferences
===============

User Preferences Mass Update
The 'InstallerPackage' directory contains the files for the actual installer zip. To create an installer, you will need to recursively zip the contents of this directory excluding the base 'InstallerPackage' directory. After the zip file is created, use the instance's Admin Module Loader to load the zip file into the Admin page. Once the UserPreferences module is loaded update the permissions on the instance.

Creative Commons License
This work is licensed under a Creative Commons Attribution-ShareAlike 3.0 Unported License with original attribution remaining with David Bergeron (https://github.com/david-bergeron/UserPreferences.git).
