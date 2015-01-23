#!/bin/bash
php vendor/bin/doctrine-module orm:convert-mapping --namespace="User\\Entity\\" --force --from-database annotation ./module/User/src
php vendor/bin/doctrine-module orm:generate-entities ./module/User/src --generate-annotations=1