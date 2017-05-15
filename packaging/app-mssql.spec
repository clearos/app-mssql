
Name: app-mssql
Epoch: 1
Version: 1.0.0
Release: 1%{dist}
Summary: Microsoft Database Server
License: GPLv3
Group: ClearOS/Apps
Source: %{name}-%{version}.tar.gz
Buildarch: noarch
Requires: %{name}-core = 1:%{version}-%{release}
Requires: app-base

%description
MSSQL is a popular database system.  It can be configured to run database driven applications, websites, CRM and practically any other resource requiring a relational storage service.

%package core
Summary: MSSQL Database Server - Core
License: LGPLv3
Group: ClearOS/Libraries
Requires: app-base-core
Requires: app-base-core >= 1:1.2.6
Requires: app-network-core
Requires: app-storage-core >= 1:1.4.7
Requires: mssql-server >= 11.0

%description core
MSSQL is a popular database system.  It can be configured to run database driven applications, websites, CRM and practically any other resource requiring a relational storage service.

This package provides the core API and libraries.

%prep
%setup -q
%build

%install
mkdir -p -m 755 %{buildroot}/usr/clearos/apps/mssql
cp -r * %{buildroot}/usr/clearos/apps/mssql/

install -d -m 0755 %{buildroot}/var/clearos/mssql
install -d -m 0755 %{buildroot}/var/clearos/mssql/backup
install -D -m 0644 packaging/mssql.php %{buildroot}/var/clearos/base/daemon/mssql.php
install -D -m 0644 packaging/mssql_default.conf %{buildroot}/etc/clearos/storage.d/mssql_default.conf

%post
logger -p local6.notice -t installer 'app-mssql - installing'

%post core
logger -p local6.notice -t installer 'app-mssql-core - installing'

if [ $1 -eq 1 ]; then
    [ -x /usr/clearos/apps/mssql/deploy/install ] && /usr/clearos/apps/mssql/deploy/install
fi

[ -x /usr/clearos/apps/mssql/deploy/upgrade ] && /usr/clearos/apps/mssql/deploy/upgrade

exit 0

%preun
if [ $1 -eq 0 ]; then
    logger -p local6.notice -t installer 'app-mssql - uninstalling'
fi

%preun core
if [ $1 -eq 0 ]; then
    logger -p local6.notice -t installer 'app-mssql-core - uninstalling'
    [ -x /usr/clearos/apps/mssql/deploy/uninstall ] && /usr/clearos/apps/mssql/deploy/uninstall
fi

exit 0

%files
%defattr(-,root,root)
/usr/clearos/apps/mssql/controllers
/usr/clearos/apps/mssql/htdocs
/usr/clearos/apps/mssql/views

%files core
%defattr(-,root,root)
%exclude /usr/clearos/apps/mssql/packaging
%dir /usr/clearos/apps/mssql
%dir /var/clearos/mssql
%dir /var/clearos/mssql/backup
/usr/clearos/apps/mssql/deploy
/usr/clearos/apps/mssql/language
/usr/clearos/apps/mssql/libraries
/var/clearos/base/daemon/mssql.php
/etc/clearos/storage.d/mssql_default.conf
