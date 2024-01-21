#echo '------'
#which jq
#jq --version
#echo '------'

echo $DEPLOY_SERVER
echo $SSH_USER
echo $REPO_PATH
echo $REPO_NAME
echo $TAG

#echo '------'
#curl -H "Authorization: token $GH_TOKEN" "https://api.github.com/repos/$REPO_PATH/releases/tags/$TAG"
#curl -H "Authorization: token $GH_TOKEN" "https://api.github.com/repos/$REPO_PATH/releases/tags/$TAG"
#echo '------'

asset_id=$(curl -H "Authorization: token $GH_TOKEN" "https://api.github.com/repos/$REPO_PATH/releases/tags/$TAG" | jq -r '.assets[0].id')
asset_name=$(curl -H "Authorization: token $GH_TOKEN" "https://api.github.com/repos/$REPO_PATH/releases/tags/$TAG" | jq -r '.assets[0].name')

#echo $asset_id
#echo $asset_name

curl -H "Authorization: token $GH_TOKEN" -H "Accept: application/octet-stream" -LJO "https://api.github.com/repos/$REPO_PATH/releases/assets/$asset_id"

#ls -la

echo "$SSH_PRIVATE" > ~/id_ed25519
chmod 600 ~/id_ed25519

scp -oStrictHostKeyChecking=accept-new -i '~/id_ed25519' "$asset_name" "$SSH_USER@$DEPLOY_SERVER:/var/www/"
ssh -i '~/id_ed25519' "$SSH_USER@$DEPLOY_SERVER" "tar xzf /var/www/$asset_name -C /var/www"

if ssh -i '~/id_ed25519' "$SSH_USER@$DEPLOY_SERVER" [[ -d "/var/www/$REPO_NAME" ]]; then
  ssh -i '~/id_ed25519' "$SSH_USER@$DEPLOY_SERVER" "rm -rf /var/www/$REPO_NAME.old && mv /var/www/$REPO_NAME /var/www/$REPO_NAME.old"
fi

ssh -i '~/id_ed25519' "$SSH_USER@$DEPLOY_SERVER" "mv /var/www/$REPO_NAME.new /var/www/$REPO_NAME"

if ssh -i '~/id_ed25519' "$SSH_USER@$DEPLOY_SERVER" [[ -d "/var/www/$REPO_NAME.old/storage" ]]; then
  ssh -i '~/id_ed25519' "$SSH_USER@$DEPLOY_SERVER" "rm -rf /var/www/$REPO_NAME/storage && mv /var/www/$REPO_NAME.old/storage /var/www/$REPO_NAME/storage"
fi

if ssh -i '~/id_ed25519' "$SSH_USER@$DEPLOY_SERVER" [[ -f "/var/www/$REPO_NAME.old/.env" ]]; then
  ssh -i '~/id_ed25519' "$SSH_USER@$DEPLOY_SERVER" "mv -f /var/www/$REPO_NAME.old/.env /var/www/$REPO_NAME/.env"
fi

ssh -i '~/id_ed25519' "$SSH_USER@$DEPLOY_SERVER" "chmod -R a+w /var/www/$REPO_NAME/storage; chmod a+w /var/www/$REPO_NAME/bootstrap/cache"
ssh -i '~/id_ed25519' "$SSH_USER@$DEPLOY_SERVER" "cd /var/www/$REPO_NAME; php artisan migrate --force; php artisan cache:clear; php artisan route:cache; screen -XS laravel-worker quit; screen -dmS laravel-worker; screen -S laravel-worker -X stuff 'php artisan queue:work\n'"

ssh -i '~/id_ed25519' "$SSH_USER@$DEPLOY_SERVER" "rm -f /var/www/$asset_name"
