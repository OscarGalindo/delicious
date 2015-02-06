#!/bin/bash
php vendor/bin/doctrine-module orm:convert-mapping --namespace="Bookmark\\Entity\\" --force --from-database annotation ./module/Application/src
php vendor/bin/doctrine-module orm:generate-entities ./module/Application/src --generate-annotations=1