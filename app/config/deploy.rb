set :application, "landing-capifony"
set :domain,      "apperclass.com"
set :deploy_to,   "/home/ubuntu/sites/landing-capifony"
set :app_path,    "app"


set :user, "ubuntu"

set :scm,         :git
set :repository,  "https://github.com/apperclass/landing.git"
set :branch, "topic/capifony"


set :model_manager, "doctrine"

role :web,        domain                         # Your HTTP server, Apache/etc
role :app,        domain, :primary => true       # This may be the same as your `Web` server

set  :use_sudo, false
set  :keep_releases,  3

# Be more verbose by uncommenting the following line
logger.level = Logger::MAX_LEVEL

#set :writable_dirs, ["app/cache", "app/logs"]
#set :webserver_user, "www-data"
#set :permission_method,  :chown
#set :use_set_permissions, true

# Load app/config/paramters_prod.yml TODO parametric
task :upload_parameters do
  origin_file = "app/config/parameters_prod.yml"
  destination_file = latest_release + "/app/config/parameters.yml" # Notice the latest_release.

  try_sudo "mkdir -p #{File.dirname(destination_file)}"
  top.upload(origin_file, destination_file)
end

# Events hooks
before "deploy:share_childs", "upload_parameters"
