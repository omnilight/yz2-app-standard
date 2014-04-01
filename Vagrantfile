# -*- mode: ruby -*-
# vi: set ft=ruby :

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = "hashicorp/precise64"
  # config.vm.box_url = "http://domain.com/path/to/above.box"

  config.vm.provision :shell, :path => "carcass/vagrant/prepare.sh"
  config.vm.provision :shell, :path => "carcass/vagrant/setup.sh"

  config.vm.network "forwarded_port", guest: 80, host: 8880, auto_correct: true # frontend
  # config.vm.network "forwarded_port", guest: 81, host: 8881, auto_correct: true # backend

  config.vm.provider :virtualbox do |virtualbox|
    virtualbox.customize ["modifyvm", :id, "--name", "demo-msforyou"]
    virtualbox.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
    virtualbox.customize ["modifyvm", :id, "--memory", "512"]
    virtualbox.customize ["setextradata", :id, "--VBoxInternal2/SharedFoldersEnableSymlinksCreate/v-root", "1"]
  end
end
