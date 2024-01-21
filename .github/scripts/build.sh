rm -rf $REPO.new/.github $REPO.new/.git $REPO.new/.gitignore $REPO.new/composer.lock
rm -rf $REPO.new/tests $REPO.new/stubs $REPO.new/.gitattributes $REPO.new/_ide_helper.php $REPO.new/phpunit.xml $REPO.new/README.md
rm -rf $REPO.new/.editorconfig $REPO.new/.idea
echo "$TAG" > $REPO.new/version.txt
touch release.tar.gz
tar --exclude=release.tar.gz -zcvf release.tar.gz $REPO.new
