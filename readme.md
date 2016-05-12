# TTM skills Audit

Transition Towns Maroondah (TTM) is planning a skills audit of our current members. Development of the code and project plan is being developed openly on GitHub with a permissive licence so other Transition or environmentally-focussed groups can re-use it in their own communities.

## Project Plan

See ttm_skills_audit.md for the latest project plan.

## Re-use

The code base is still under active development. Once completed for TTM purposes, I'll re-factor it to make it easier for other groups to use. This will include:

* SQL files to construct the necessary database tables (TBC)
* Example data for the skills and interests in CSV format (TBC)
* Moving all TTM-specific values to config files (in progress)
* Commenting parts of the files where changes are needed

The current incarnation of the form only allows registered members to submit the form; members are validated by their email address against the records stored in the database. If you want to allow new members, you'll have to remove the validations and create your own functionality to write new users to the database. I'm planning on addressing this in another project.

The form is dynamically generated, pulling a list of skills and interests from the database. You will have to pre-populate your database with skills and interests matched to your needs. Once the tables are created, you can do so easily by dumping in a CSV file with your database client of choice. I'll include examples when I get the chance.

## Installation and requirements

Requirements are straight forward and this should run on most shared hosting providers. The target platform is PHP 5.6 or later but older versions (down to 5.4) should work. The target database is MySQL but the PDO class I've included should make it easy to swap out MySQL for a database of your choice. You also require Google reCAPTCHA for your site.

Installation

1. Edit the SQL scripts (TBC) as required to suit your database.
2. Update your database with the SQL scripts.
3. copy _inc/config.env.template_ to news files for dev, test, prod i.e _inc/config.dev.php_ and edit the constants with your settings.
4. If you've edited table/columns names in your database, update the SQL statements accordingly.
5. Upload the contents of survey/ to your preferred location on your dev/test/prod web server.

