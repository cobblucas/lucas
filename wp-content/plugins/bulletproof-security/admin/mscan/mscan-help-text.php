<?php
#  ________         ____________      _____ ________                       ________      
#  ___  __ )____  _____  /___  /_____ __  /____  __ \______________ ______ ___  __/      
#  __  __  |_  / / /__  / __  / _  _ \_  __/__  /_/ /__  ___/_  __ \_  __ \__  /_        
#  _  /_/ / / /_/ / _  /  _  /  /  __// /_  _  ____/ _  /    / /_/ // /_/ /_  __/        
#  /_____/  \__,_/  /_/   /_/   \___/ \__/  /_/      /_/     \____/ \____/ /_/           
#  ________                             _____ _____              ________                
#  __  ___/_____ ___________  _____________(_)__  /______  __    ___  __ \______________ 
#  _____ \ _  _ \_  ___/_  / / /__  ___/__  / _  __/__  / / /    __  /_/ /__  ___/_  __ \
#  ____/ / /  __// /__  / /_/ / _  /    _  /  / /_  _  /_/ /     _  ____/ _  /    / /_/ /
#  /____/  \___/ \___/  \__,_/  /_/     /_/   \__/  _\__, /      /_/      /_/     \____/ 
#                                                   /____/                               
# 42756C6C657450726F6F66 5365637572697479 50726F 
#
/*	The Copyright, AITpro Software Products License Information must remain
	intact or all BulletProof Security Pro warranties, guarantees, liabilities are void.
	
	Copyright (C) 2011-2017 Edward Alexander, AIT-pro.com. All rights reserved.

	AITpro Software Products License Information:
	BY DOWNLOADING, INSTALLING, COPYING, ACCESSING, OR USING BulletProof Security Pro YOU AGREE TO THE TERMS OF THIS AGREEMENT. 
	IF YOU 	ARE ACCEPTING THESE TERMS ON BEHALF OF ANOTHER PERSON OR A COMPANY OR OTHER LEGAL ENTITY, YOU REPRESENT AND WARRANT
	THAT YOU HAVE FULL AUTHORITY TO BIND THAT PERSON, COMPANY, OR LEGAL ENTITY TO THESE TERMS. IF YOU DO NOT AGREE TO THESE TERMS,
	* DO NOT DOWNLOAD, INSTALL, COPY, ACCESS, OR USE BulletProof Security Pro; AND
	* PROMPTLY RETURN BulletProof Security Pro TO THE PARTY FROM WHOM YOU ACQUIRED IT. IF YOU DOWNLOADED BulletProof Security Pro
	FROM THE AITPRO WEBSITE, CONTACT AITPRO FOR A REFUND IF APPLICABLE.
	
	AITpro Software Products License Information continued:
	You agree to keep the AITpro Software Products License for BulletProof Security Pro, unmodified or altered in any way,
	with the original copy of BulletProof Security Pro that you have and any and all copies or partial copies of BulletProof
	Security Pro that You make. 
*/
// Direct calls to this file are Forbidden when core files are not present 
if ( ! current_user_can('manage_options') ) { 
		header('Status: 403 Forbidden');
		header('HTTP/1.1 403 Forbidden');
		exit();
}
	
	/**	MScan **/
	$bps_modal_content1 = '<strong><font color="blue">'.__('For more extensive help info and answers to common issues or problems click the MScan Malware Scanner Guide link above. For troubleshooting help or to post suspicious code click the MScan Troubleshooting & Code Posting link above.', 'bulletproof-security').'</font></strong><br><br><strong>'.__('Start Scan', 'bulletproof-security').'</strong><br>'.__('Clicking the Start Scan button starts a scan.', 'bulletproof-security').'<br><br><strong>'.__('Stop Scan', 'bulletproof-security').'</strong><br>'.__('Clicking the Stop Scan button stops a scan.', 'bulletproof-security').'<br><br><strong>'.__('Hosting Account Root Folders', 'bulletproof-security').'</strong><br>'.__('All of your hosting account folders are checked/selected by default and will be scanned. Checking a checkbox means scan that folder. Unchecking a checkbox means do not scan that folder.', 'bulletproof-security').'<br><br><strong>'.__('Max File Size Limit to Scan', 'bulletproof-security').'</strong><br>'.__('Files that are larger than 400KB will be skipped by default in a regular scan and can be scanned using a Skipped File scan.', 'bulletproof-security').'<br><br><strong>'.__('Max Time Limit to Scan', 'bulletproof-security').'</strong><br>'.__('The default time limit for script execution on most web hosts is 300 seconds. The default time limit setting for MScan scanning is also set to 300 seconds. It is not recommended that you increase the time limit higher than 300 seconds.', 'bulletproof-security').'<br><br><strong>'.__('Scan Database', 'bulletproof-security').'</strong><br>'.__('When Database scan is turned on your WordPress database will be scanned for suspicious code.', 'bulletproof-security').'<br><br><strong>'.__('Scan Image Files (Stegosploit|Exif Hack)', 'bulletproof-security').'</strong><br>'.__('WARNING: Scanning image files may cause scanning to stop or fail. Most web hosts already have security protection against Stegosploit and Exif image hacks. It is recommended that you do not scan image files.', 'bulletproof-security').'<br><br><strong>'.__('Scan Skipped Files Only', 'bulletproof-security').'</strong><br>'.__('When Skipped File Scan is On only skipped files will be scanned. Note: The only MScan option setting that has any effect while Skipped File Scan is On is Image File Scan On or Off. You do not need to change any of your other MScan option settings when running a Skipped File scan.', 'bulletproof-security').'<br><br><strong>'.__('Automatically Delete /tmp Files', 'bulletproof-security').'</strong><br>'.__('When Delete Tmp Files is On, all temporary files will be deleted. Hackers commonly hide hacker files in the /tmp folder.', 'bulletproof-security').'<br><br><strong>'.__('Scheduled Scan Frequency (BPS Pro only)', 'bulletproof-security').'</strong><br>'.__('You can choose to schedule ongoing automated scans (BPS Pro Only). Note: The BPS Pro ARQ IDPS scanner is far superior to any/all Malware scanners including BPS Pro MScan. Click the MScan Malware Scanner Guide link above for more information regarding using ARQ IDPS and MScan together.', 'bulletproof-security').'<br><br><strong>'.__('Scan Time Estimate Tool', 'bulletproof-security').'</strong><br>'.__('IMPORTANT: You can stop the scan time estimate if it hangs or is taking too long by clicking the Stop Scan button. This tool allows you to check the estimated total scan time of a scan based on your MScan option settings without actually performing/running a scan. Note: This tool does not affect or change any previous scan results except for the Total Scan Time, which will be changed to the estimated scan time. Example Usage: You can check or uncheck Hosting Account Root Folders checkboxes and change any other MScan option settings, save your MScan option settings and then run the Scan Time Estimate Tool to get the total estimated time that the actual scan will take.', 'bulletproof-security').'<br><br><strong>'.__('Delete Scan Status Tool', 'bulletproof-security').'</strong><br>'.__('This tool allows you to delete all of the MScan Status option values. The Scan Completed timestamp, Total Scan Time, Total Files Scanned, Skipped Files, Suspicious Files and Suspicious DB Entries status values will be deleted and will either display blank or 0.', 'bulletproof-security').'<br><br><strong>'.__('Delete DB Scan Data Tool', 'bulletproof-security').'</strong><br>'.__('This tool allows you to delete/reset all of the database scan data in the View|Ignore|Delete Suspicious Files and View|Ignore Suspicious DB Entries Forms. Note: Any/all changes you have made and saved in these Forms will be deleted. You may want to use BPS DB Backup and do a database backup before using this tool.', 'bulletproof-security').'<br><br><strong>'.__('View|Ignore|Delete Suspicious Files', 'bulletproof-security').'</strong><br>'.__('This form allows you to view, ignore, unignore or delete suspicious and skipped files. If you are not sure if code is malicious or safe you can copy the code and post the code in the MScan Troubleshooting & Code Posting form topic. See the link above. If you are unsure if a file is a hacker file or not then download a copy of that file before deleting it. When you ignore a file it will no longer be scanned in any future scans. When you unignore an ignored file it will be scanned in future scans.', 'bulletproof-security').'<br><br><strong>'.__('View|Ignore Suspicious DB Entries', 'bulletproof-security').'</strong><br>'.__('This form allows you to view, ignore or unignore suspicious DB Entries. Note: The view option displays the DB Table, Column, Row ID and the MScan Pattern Match that was detected by the MScan scan. Use phpMyAdmin or a similar tool to check your database Row where the suspicious code was found. When you ignore a DB Entry it will no longer be scanned in any future scans. When you unignore an ignored DB Entry it will be scanned in future scans.', 'bulletproof-security');

	/** MScan Log **/
	$bps_modal_content2 = '<strong>'.__('This Read Me Help window is draggable (top) and resizable (bottom right corner)', 'bulletproof-security').'</strong><br><br><strong>'.__('MScan Log General Information', 'bulletproof-security').'</strong><br>'.__('Your MScan Log file is a plain text static file and not a dynamic file or dynamic display to keep your website resource usage at a bare minimum and keep your website performance at a maximum. Log entries are logged in descending order by Date and Time. You can copy, edit and delete this plain text file. You can choose S-Monitor Email Alerting & Log File Options to automatically email your MScan Log file to you and delete it when it reaches a certain size (256KB, 500KB or 1MB).', 'bulletproof-security').'<strong><br><br>'.__('MScan Logging', 'bulletproof-security').'</strong><br>'.__('Logs extensive details about each scan that you run.', 'bulletproof-security').'<strong><br><br>'.__('MScan Log File Size', 'bulletproof-security').'</strong><br>'.__('Displays the size of your MScan Log file. If your log file is larger than 2MB then you will see a Red warning message displayed: The S-Monitor Email Alerting & Log File Options will only send log files up to 2MB in size. Copy and paste the MScan Log file contents into a Notepad text file on your computer and save it. Then click the Delete Log button to delete the contents of this Log file.', 'bulletproof-security').'<br><br><strong>'.__('MScan Log Last Modified Time', 'bulletproof-security').'</strong><br>'.__('The Reset Last Modified Time in DB option/feature is currently completely automated and does not require any manual steps performed by you.', 'bulletproof-security').'<br><br><strong>'.__('Delete Log Button', 'bulletproof-security').'</strong><br>'.__('Clicking the Delete Log button will delete the entire contents of your MScan Log File. If you have setup S-Monitor Email Alerting & Log Options then the only time you would probably need to use the Delete Log button is if your MScan Log file exceeds 2MB in size.', 'bulletproof-security');

?>