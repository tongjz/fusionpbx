<?php
/*
	FusionPBX
	Version: MPL 1.1

	The contents of this file are subject to the Mozilla Public License Version
	1.1 (the "License"); you may not use this file except in compliance with
	the License. You may obtain a copy of the License at
	http://www.mozilla.org/MPL/

	Software distributed under the License is distributed on an "AS IS" basis,
	WITHOUT WARRANTY OF ANY KIND, either express or implied. See the License
	for the specific language governing rights and limitations under the
	License.

	The Original Code is FusionPBX

	The Initial Developer of the Original Code is
	Mark J Crane <markjcrane@fusionpbx.com>
	Portions created by the Initial Developer are Copyright (C) 2008-2012
	the Initial Developer. All Rights Reserved.

	Contributor(s):
	Mark J Crane <markjcrane@fusionpbx.com>
	Matthew Vale <github@mafoo.org>
*/

	echo "<form method='post' name='frm' action=''>\n";
	echo "<input type='hidden' name='install_language' value='".$_SESSION['domain']['language']['code']."'/>\n";
	echo "<input type='hidden' name='return_install_step' value='config_database'/>\n";
	echo "<input type='hidden' name='install_step' value='execute'/>\n";

	echo "<input type='hidden' name='event_host' value='$event_host'/>\n";
	echo "<input type='hidden' name='event_port' value='$event_port'/>\n";
	echo "<input type='hidden' name='event_password' value='$event_password'/>\n";
	echo "<input type='hidden' name='db_type' value='$db_type'/>\n";
	echo "<input type='hidden' name='admin_username' value='$admin_username'/>\n";
	echo "<input type='hidden' name='admin_password' value='$admin_password'/>\n";
	echo "<input type='hidden' name='install_default_country' value='$install_default_country'/>\n";
	echo "<input type='hidden' name='install_template_name' value='$install_template_name'/>\n";
	echo "<input type='hidden' name='domain_name' value='$domain_name'/>\n";

	echo "<table width='100%' border='0' cellpadding='0' cellspacing='0'>\n";

	echo "<tr>\n";
	echo "<td align='left' width='30%' nowrap><b>".$text['header-config_database']."</b></td>\n";
	echo "<td width='70%' align='right'>&nbsp;</td>\n";
	echo "</tr>\n";

	if ($db_type == "sqlite") {

		echo "<tr>\n";
		echo "<td class='vncell' 'valign='top' align='left' nowrap>\n";
		echo "	Database Filename\n";
		echo "</td>\n";
		echo "<td class='vtable' align='left'>\n";
		echo "	<input class='formfld' type='text' name='db_name' maxlength='255' value=\"$db_name\"><br />\n";
		echo "	Set the database filename. The file extension should be '.db'.\n";
		echo "\n";
		echo "</td>\n";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<td class='vncell' 'valign='top' align='left' nowrap>\n";
		echo "	Database Directory\n";
		echo "</td>\n";
		echo "<td class='vtable' align='left'>\n";
		echo "	<input class='formfld' type='text' name='db_path' maxlength='255' value=\"$db_path\"><br />\n";
		echo "	Set the path to the database directory.\n";
		echo "</td>\n";
		echo "</tr>\n";

	}

	if ($db_type == "mysql") {

		//set defaults
			if (strlen($db_host) == 0) { $db_host = 'localhost'; }
			if (strlen($db_port) == 0) { $db_port = '3306'; }
			//if (strlen($db_name) == 0) { $db_name = 'fusionpbx'; }

		echo "<tr>\n";
		echo "<td class='vncellreq' valign='top' align='left' nowrap>\n";
		echo "		Database Host\n";
		echo "</td>\n";
		echo "<td class='vtable' align='left'>\n";
		echo "		<input class='formfld' type='text' name='db_host' maxlength='255' value=\"$db_host\"><br />\n";
		echo "		Enter the host address for the database server.\n";
		echo "\n";
		echo "</td>\n";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<td class='vncell' valign='top' align='left' nowrap>\n";
		echo "		Database Port\n";
		echo "</td>\n";
		echo "<td class='vtable' align='left'>\n";
		echo "		<input class='formfld' type='text' name='db_port' maxlength='255' value=\"$db_port\"><br />\n";
		echo "		Enter the port number. It is optional if the database is using the default port.\n";
		echo "\n";
		echo "</td>\n";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<td class='vncellreq' valign='top' align='left' nowrap>\n";
		echo "		Database Name\n";
		echo "</td>\n";
		echo "<td class='vtable' align='left'>\n";
		echo "		<input class='formfld' type='text' name='db_name' maxlength='255' value=\"$db_name\"><br />\n";
		echo "		Enter the name of the database.\n";
		echo "\n";
		echo "</td>\n";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<td class='vncellreq' valign='top' align='left' nowrap>\n";
		echo "		Database Username\n";
		echo "</td>\n";
		echo "<td class='vtable' align='left'>\n";
		echo "		<input class='formfld' type='text' name='db_username' maxlength='255' value=\"$db_username\"><br />\n";
		echo "		Enter the database username. \n";
		echo "\n";
		echo "</td>\n";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<td class='vncellreq' valign='top' align='left' nowrap>\n";
		echo "		Database Password\n";
		echo "</td>\n";
		echo "<td class='vtable' align='left'>\n";
		echo "		<input class='formfld' type='text' name='db_password' maxlength='255' value=\"$db_password\"><br />\n";
		echo "		Enter the database password.\n";
		echo "\n";
		echo "</td>\n";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<td class='vncell' valign='top' align='left' nowrap>\n";
		echo "		Create Database Options\n";
		echo "</td>\n";
		echo "<td class='vtable' align='left'>\n";
		echo "	<label class='radio'><input type='radio' name='create_db_option' value='none'";
		if($db_create_option=='none') { echo " checked='checked'"; }
		echo "/>Do not create database</label>\n";
		echo "	<label class='radio'><input type='radio' name='create_db_option' value='same'";
		if($db_create_option=='same') { echo " checked='checked'"; }
		echo "/>Create database using above username/password</label>\n";
		echo "	<label class='radio'><input type='radio' name='create_db_option' value='user'";
		if($db_create_option=='user') { echo " checked='checked'"; }
		echo "/>Create database using below username/password</label>\n";
		echo "<br />\n";
		echo "Choose whether to create the database\n";
		echo "</td>\n";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<td class='vncell' valign='top' align='left' nowrap>\n";
		echo "		Create Database Username\n";
		echo "</td>\n";
		echo "<td class='vtable' align='left'>\n";
		echo "		<input class='formfld' type='text' name='db_create_username' maxlength='255' value=\"$db_create_username\"><br />\n";
		echo "		Optional, this username is used to create the database, a database user and set the permissions. \n";
		echo "		By default this username is 'root' however it can be any account with permission to add a database, user, and grant permissions. \n";
		echo "</td>\n";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<td class='vncell' valign='top' align='left' nowrap>\n";
		echo "		Create Database Password\n";
		echo "</td>\n";
		echo "<td class='vtable' align='left'>\n";
		echo "		<input class='formfld' type='text' name='db_create_password' maxlength='255' value=\"$db_create_password\"><br />\n";
		echo "		Enter the create database password.\n";
		echo "\n";
		echo "</td>\n";
		echo "</tr>\n";

	}

	if ($db_type == "pgsql") {
		if (strlen($db_host) == 0) { $db_host = 'localhost'; }
		if (strlen($db_port) == 0) { $db_port = '5432'; }
		if (strlen($db_name) == 0) { $db_name = 'fusionpbx'; }

		echo "<tr>\n";
		echo "<td class='vncellreq' valign='top' align='left' nowrap>\n";
		echo "		Database Host\n";
		echo "</td>\n";
		echo "<td class='vtable' align='left'>\n";
		echo "		<input class='formfld' type='text' name='db_host' maxlength='255' value=\"$db_host\"><br />\n";
		echo "		Enter the host address for the database server.\n";
		echo "\n";
		echo "</td>\n";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<td class='vncell' valign='top' align='left' nowrap>\n";
		echo "		Database Port\n";
		echo "</td>\n";
		echo "<td class='vtable' align='left'>\n";
		echo "		<input class='formfld' type='text' name='db_port' maxlength='255' value=\"$db_port\"><br />\n";
		echo "		Enter the port number. It is optional if the database is using the default port.\n";
		echo "\n";
		echo "</td>\n";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<td class='vncellreq' valign='top' align='left' nowrap>\n";
		echo "		Database Name\n";
		echo "</td>\n";
		echo "<td class='vtable' align='left'>\n";
		echo "		<input class='formfld' type='text' name='db_name' maxlength='255' value=\"$db_name\"><br />\n";
		echo "		Enter the name of the database.\n";
		echo "\n";
		echo "</td>\n";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<td class='vncellreq' valign='top' align='left' nowrap>\n";
		echo "		Database Username\n";
		echo "</td>\n";
		echo "<td class='vtable' align='left'>\n";
		echo "		<input class='formfld' type='text' name='db_username' maxlength='255' value=\"$db_username\"><br />\n";
		echo "		Enter the database username.\n";
		echo "\n";
		echo "</td>\n";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<td class='vncellreq' valign='top' align='left' nowrap>\n";
		echo "		Database Password\n";
		echo "</td>\n";
		echo "<td class='vtable' align='left'>\n";
		echo "		<input class='formfld' type='text' name='db_password' maxlength='255' value=\"$db_password\"><br />\n";
		echo "		Enter the database password.\n";
		echo "\n";
		echo "</td>\n";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<td class='vncell' valign='top' align='left' nowrap>\n";
		echo "		Create Database Options\n";
		echo "</td>\n";
		echo "<td class='vtable' align='left'>\n";
		echo "	<label class='radio'><input type='checkbox' name='db_create' value='1'";
		if($db_create=='1') { echo " checked='checked'"; }
		echo "/>Create the database</label>\n";
		echo "</td>\n";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<td class='vncell' valign='top' align='left' nowrap>\n";
		echo "		Create Database Username\n";
		echo "</td>\n";
		echo "<td class='vtable' align='left'>\n";
		echo "		<input class='formfld' type='text' name='db_create_username' maxlength='255' value=\"$db_create_username\"><br />\n";
		echo "		Optional, this username is used to create the database, a database user and set the permissions. \n";
		echo "		By default this username is 'pgsql' however it can be any account with permission to add a database, user, and grant permissions. \n";
		echo "		Leave blank to use the details above. \n";
		echo "</td>\n";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<td class='vncell' valign='top' align='left' nowrap>\n";
		echo "		Create Database Password\n";
		echo "</td>\n";
		echo "<td class='vtable' align='left'>\n";
		echo "		<input class='formfld' type='text' name='db_create_password' maxlength='255' value=\"$db_create_password\"><br />\n";
		echo "		Enter the create database password.\n";
		echo "\n";
		echo "</td>\n";
		echo "</tr>\n";
	}

	echo "</table>";
	echo "	<div style='text-align:right'>\n";
	echo "    <button type='button' onclick=\"history.go(-1);\">".$text['button-back']."</button>\n";
	echo "    <button type='submit'>".$text['button-execute']."</button>\n";
	echo "	</div>\n";
	echo "</form>\n";
?>