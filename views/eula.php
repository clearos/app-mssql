<?php

/**
 * End User License Agreement View.
 *
 * @category   apps
 * @package    mssql
 * @subpackage views
 * @author     ClearFoundation <developer@clearfoundation.com>
 * @copyright  2017 ClearFoundation
 * @license    http://www.gnu.org/copyleft/gpl.html GNU General Public License version 3 or later
 * @link       http://www.clearfoundation.com/docs/developer/apps/mssql/
 */

///////////////////////////////////////////////////////////////////////////////
//
// This program is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with this program.  If not, see <http://www.gnu.org/licenses/>.  
//  
///////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////
// Load dependencies
///////////////////////////////////////////////////////////////////////////////

$this->lang->load('base');
$this->lang->load('mssql');

///////////////////////////////////////////////////////////////////////////////
// Show warning if password is not set
///////////////////////////////////////////////////////////////////////////////

echo infobox_warning(lang('mssql_eula_required'), lang('mssql_please_agree_to_eula'));
echo form_open('mssql/setting/agree_eula');
echo form_header('');
?>

<div dir="ltr" style="color: #222222; font-family: arial, sans-serif; font-size: 12.8px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial; height: 500px; overflow: scroll;">
<div>
<div>
<div style="font-family: segoe-ui_normal, 'segoe ui', segoe, 'segoe wp', 'helvetica neue', helvetica, sans-serif; font-size: 16px;">
<div class="m_-7218026983287991296gmail-content">
<h2 id="microsoft-software-license-terms">MICROSOFT SOFTWARE LICENSE TERMS</h2>
<p class="lf-text-block lf-block" data-lf-anchor-id="cd5e6417c0c18af63fa3086bdfb58c3a:0"><strong>MICROSOFT SQL SERVER MANAGEMENT STUDIO</strong></p>
<hr />
<p class="lf-text-block lf-block" data-lf-anchor-id="49982c2dd5bfe8bd68fdac8f4f27f750:0">These license terms are an agreement between Microsoft Corporation (or based on where you live, one of its affiliates) and you. Please read them. They apply to the software named above, which includes the media on which you received it, if any. The terms also apply to any Microsoft</p>
<ul class="lf-text-block lf-block" data-lf-anchor-id="824d1154d20c31311c863e0001ae3f80:0">
<li>updates,</li>
<li>supplements,</li>
<li>Internet-based services, and</li>
<li>support services</li>
</ul>
<p class="lf-text-block lf-block" data-lf-anchor-id="490010aab13c9dbc0a1c058f4e68dda8:0">for this software, unless other terms accompany those items. If so, those terms apply.</p>
<p class="lf-text-block lf-block" data-lf-anchor-id="c9dcaa46999a38f00d4cac075b22798b:0"><strong>By using the software, you accept these terms. If you do not accept them, do not use the software.<br />As described below, using some features also operates as your consent to the transmission of certain standard computer information for Internet-based services.</strong></p>
<hr />
<p class="lf-text-block lf-block" data-lf-anchor-id="27cd2976561223d80ae4618123b10ddb:0"><strong>If you comply with these license terms, you have the perpetual rights below.</strong><br /><strong>1. INSTALLATION AND USE RIGHTS.</strong></p>
<p class="lf-text-block lf-block" data-lf-anchor-id="9add0d38ddb974b82e8fb84641376bf0:0">&nbsp;&nbsp;<strong>a. Installation and Use.</strong> You may install and use one copy of the software on your device.</p>
<p class="lf-text-block lf-block" data-lf-anchor-id="9bce2b441b186ded2dcca0775505d525:0">&nbsp;&nbsp;<strong>b. Third Party Programs.</strong> The software may include third party programs that Microsoft, not the third party, licenses to you under this agreement. Notices, if any, for the third party program are included for your information only.</p>
<p class="lf-text-block lf-block" data-lf-anchor-id="34154c020f0e21d50a86438049f20208:0"><strong>2. ADDITIONAL LICENSING REQUIREMENTS AND/OR USE RIGHTS.</strong></p>
<p class="lf-text-block lf-block" data-lf-anchor-id="0198aeac57bbe7a00069b98643292f63:0">&nbsp;&nbsp;<strong>a. Distributable Code.</strong> The software contains code that you are permitted to distribute in programs you develop if you comply with the terms below.</p>
<p class="lf-text-block lf-block" data-lf-anchor-id="ccf56d055c9d65312acf3b427f266773:0">&nbsp;&nbsp;&nbsp;&nbsp;<strong>i. Right to Use and Distribute. The code and text files listed below are &ldquo;Distributable Code.&rdquo;</strong></p>
<ul class="lf-text-block lf-block" data-lf-anchor-id="8bc9af155d094c380f2f3941636767a8:0">
<li><em>Sample Code</em>. You may modify, copy, and distribute the source and object code form of code marked as &ldquo;sample.&rdquo;</li>
<li><em>Third Party Distribution</em>. You may permit distributors of your programs to copy and distribute the Distributable Code as part of those programs.</li>
</ul>
<p class="lf-text-block lf-block" data-lf-anchor-id="659bef907d9ae5a04ce89774072b75fb:0">&nbsp;&nbsp;&nbsp;&nbsp;<strong>ii. Distribution Requirements. For any Distributable Code you distribute, you must</strong></p>
<ul class="lf-text-block lf-block" data-lf-anchor-id="29f48b14fd8b2fb505ee994645276d79:0">
<li>add significant primary functionality to it in your programs;</li>
<li>for any Distributable Code having a filename extension of .lib, distribute only the results of running such Distributable Code through a linker with your program;</li>
<li>distribute Distributable Code included in a setup program only as part of that setup program without modification;</li>
<li>require distributors and external end users to agree to terms that protect it at least as much as this agreement;</li>
<li>display your valid copyright notice on your programs; and</li>
<li>indemnify, defend, and hold harmless Microsoft from any claims, including attorneys&rsquo; fees, related to the distribution or use of your programs.</li>
</ul>
<p class="lf-text-block lf-block" data-lf-anchor-id="01216d004093e9ec8d07a42c3f2523ab:0">&nbsp;&nbsp;&nbsp;&nbsp;<strong>iii. Distribution Restrictions. You may not</strong></p>
<ul class="lf-text-block lf-block" data-lf-anchor-id="81152f6d4b9b06b020e9bb474b422f1b:0">
<li>alter any copyright, trademark or patent notice in the Distributable Code;</li>
<li>use Microsoft&rsquo;s trademarks in your programs&rsquo; names or in a way that suggests your programs come from or are endorsed by Microsoft;</li>
<li>distribute Distributable Code to run on a platform other than the Windows platform;</li>
<li>include Distributable Code in malicious, deceptive or unlawful programs; or</li>
<li>modify or distribute the source code of any Distributable Code so that any part of it becomes subject to an Excluded License. An Excluded License is one that requires, as a condition of use, modification or distribution, that
<ul>
<li>the code be disclosed or distributed in source code form; or</li>
<li>others have the right to modify it.</li>
</ul>
</li>
</ul>
<p class="lf-text-block lf-block" data-lf-anchor-id="814d3918c779e2b32156ba0f3026ada8:0"><strong>3. INTERNET-BASED SERVICES.</strong> Microsoft provides Internet-based services with the software. It may change or cancel them at any time.</p>
<p class="lf-text-block lf-block" data-lf-anchor-id="9fda6c1bc5b230b23bedb58e59e37e73:0">&nbsp;&nbsp;<strong>a. Consent for Internet-Based Services.</strong> The software feature described below and in the SQL Server Privacy Statement connects to Microsoft or service provider computer systems over the Internet. In some cases, you will not receive a separate notice when they connect. You may switch off this feature or not use it. For more information about this feature, see <a href="http://go.microsoft.com/fwlink/?LinkID=398120" data-linktype="external">http://go.microsoft.com/fwlink/?LinkID=398120</a>. <strong>By using this feature, you consent to the transmission of this information</strong>. Microsoft does not use the information to identify or contact you.</p>
<p class="lf-text-block lf-block" data-lf-anchor-id="8bd88c2ed79d60f31f6da9466126635a:0">&nbsp;&nbsp;<strong>i. Computer Information.</strong> The following feature uses Internet protocols, which send to the appropriate systems computer information, such as your Internet protocol address, the type of operating system, browser and name and version of the software you are using, and the language code of the device where you installed the software. Microsoft uses this information to make the Internet-based service available to you.</p>
<ul class="lf-text-block lf-block" data-lf-anchor-id="9fd72c2bc5b1eed029eda8d55d26e359:0">
<li>Web Content Features. Features in the software can retrieve related content from Microsoft and provide it to you. To provide the content, these features send to Microsoft the type of operating system, name and version of the software you are using, type of browser and language code of the device where you installed the software. Examples of these features are clip art, templates, online training, online assistance, help and Appshelp. You may choose not to use these web content features.</li>
</ul>
<p class="lf-text-block lf-block" data-lf-anchor-id="9ff44d38cd08ecb135653846517247b9:0">&nbsp;&nbsp;<strong>ii. Use of Information.</strong> We may use the computer information, to improve our software and services. We may also share it with others, such as hardware and software vendors. They may use the information to improve how their products run with Microsoft software.</p>
<p class="lf-text-block lf-block" data-lf-anchor-id="13932e0845be20b83d8da24703230b7b:0"><strong>4. SCOPE OF LICENSE.</strong> The software is licensed, not sold. This agreement only gives you some rights to use the software. Microsoft reserves all other rights. Unless applicable law gives you more rights despite this limitation, you may use the software only as expressly permitted in this agreement. In doing so, you must comply with any technical limitations in the software that only allow you to use it in certain ways. You may not</p>
<ul class="lf-text-block lf-block" data-lf-anchor-id="99d82c6f15b8acbb1d8078461303af7b:0">
<li>work around any technical limitations in the software;</li>
<li>reverse engineer, decompile or disassemble the software, except and only to the extent that applicable law expressly permits, despite this limitation;</li>
<li>make more copies of the software than specified in this agreement or allowed by applicable law, despite this limitation;</li>
<li>publish the software for others to copy;</li>
<li>rent, lease or lend the software;</li>
<li>transfer the software or this agreement to any third party; or</li>
<li>use the software for commercial software hosting services.</li>
</ul>
<p class="lf-text-block lf-block" data-lf-anchor-id="4bda2baa9d9b6ab9371fa9164323cb7b:0"><strong>5. BACKUP COPY.</strong> You may make one backup copy of the software. You may use it only to reinstall the software.</p>
<p class="lf-text-block lf-block" data-lf-anchor-id="93cf2c2e9c1a1eb527a59f47e7277678:0"><strong>6. DOCUMENTATION.</strong> Any person that has valid access to your computer or internal network may copy and use the documentation for your internal, reference purposes.</p>
<p class="lf-text-block lf-block" data-lf-anchor-id="bd446d38d58a65790ba48cdc4b336751:0"><strong>7. EXPORT RESTRICTIONS.</strong> The software is subject to United States export laws and regulations. You must comply with all domestic and international export laws and regulations that apply to the software. These laws include restrictions on destinations, end users and end use. For additional information, see www.microsoft.com/exporting.</p>
<p class="lf-text-block lf-block" data-lf-anchor-id="81c05992e51c89b300460c1ee32bf6e9:0"><strong>8. SUPPORT SERVICES.</strong> Because this software is &ldquo;as is,&rdquo; we may not provide support services for it.</p>
<p class="lf-text-block lf-block" data-lf-anchor-id="1b4d2c52d71c24f93a873006438e47d2:0"><strong>9. ENTIRE AGREEMENT.</strong> This agreement, and the terms for supplements, updates, Internet-based services and support services that you use, are the entire agreement for the software and support services.</p>
<p class="lf-text-block lf-block" data-lf-anchor-id="93d8566807e646619f7e38b49103f860:0"><strong>10. APPLICABLE LAW.</strong></p>
<p class="lf-text-block lf-block" data-lf-anchor-id="0bd3076acf396659388cf055406f1f75:0">&nbsp;&nbsp;<strong>a. United States.</strong> If you acquired the software in the United States, Washington state law governs the interpretation of this agreement and applies to claims for breach of it, regardless of conflict of laws principles. The laws of the state where you live govern all other claims, including claims under state consumer protection laws, unfair competition laws, and in tort.</p>
<p class="lf-text-block lf-block" data-lf-anchor-id="0988246c973a26f8398dfc5741091b55:0">&nbsp;&nbsp;<strong>b. Outside the United States.</strong> If you acquired the software in any other country, the laws of that country apply.</p>
<p class="lf-text-block lf-block" data-lf-anchor-id="ab8b2a42c39627b83dcda50b07235d75:0"><strong>11. LEGAL EFFECT.</strong> This agreement describes certain legal rights. You may have other rights under the laws of your country. You may also have rights with respect to the party from whom you acquired the software. This agreement does not change your rights under the laws of your country if the laws of your country do not permit it to do so.</p>
<p class="lf-text-block lf-block" data-lf-anchor-id="2b942d4ec3e9e7d83f660947432b6ff5:0"><strong>12. DISCLAIMER OF WARRANTY. The software is licensed &ldquo;as-is.&rdquo; You bear the risk of using it. Microsoft gives no express warranties, guarantees or conditions. You may have additional consumer rights or statutory guarantees under your local laws which this agreement cannot change. To the extent permitted under your local laws, Microsoft excludes the implied warranties of merchantability, fitness for a particular purpose and non-infringement.</strong></p>
<p class="lf-text-block lf-block" data-lf-anchor-id="3707f7424732e7d12a8f653567295dfd:0"><strong>FOR AUSTRALIA &ndash; You have statutory guarantees under the Australian Consumer Law and nothing in these terms is intended to affect those rights.</strong></p>
<p class="lf-text-block lf-block" data-lf-anchor-id="e8df4eb340b6e08db9c7011c5f339e78:0"><strong>13. LIMITATION ON AND EXCLUSION OF REMEDIES AND DAMAGES. You can recover from Microsoft and its suppliers only direct damages up to U.S. $5.00. You cannot recover any other damages, including consequential, lost profits, special, indirect or incidental damages.</strong><br />This limitation applies to</p>
<ul class="lf-text-block lf-block" data-lf-anchor-id="d1582745ef79bcb01dc038054183b747:0">
<li>anything related to the software, services, content (including code) on third party Internet sites, or third party programs; and</li>
<li>claims for breach of contract, breach of warranty, guarantee or condition, strict liability, negligence, or other tort to the extent permitted by applicable law.</li>
</ul>
<p class="lf-text-block lf-block" data-lf-anchor-id="c99c4e4b4bfb92b839c5aa4757638b1b:0">It also applies even if Microsoft knew or should have known about the possibility of the damages. The above limitation or exclusion may not apply to you because your country may not allow the exclusion or limitation of incidental, consequential or other damages.</p>
</div>
</div>
</div>
</div>
</div>

<?php

echo field_password('system_password', '', lang('mssql_system_password'));
echo field_button_set(
    array(form_submit_custom('submit', lang('mssql_i_agree'), 'high'))
);

echo form_footer();
echo form_close();
