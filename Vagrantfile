Vagrant.configure("2") do |config|

  config.vm.box = "precise64"
  config.vm.box_url = "http://files.vagrantup.com/precise64.box"

  config.vm.provision :shell, :path => "carcass/vagrant/prepare-precise64.sh"
  config.vm.provision :shell, :path => "carcass/vagrant/setup-app.sh"

  config.vm.network "forwarded_port", guest: 80, host: 8880 # frontend
  # config.vm.network "forwarded_port", guest: 81, host: 8881 # backend

  config.vm.provider :virtualbox do |virtualbox|
      virtualbox.customize ["modifyvm", :id, "--name", "yz2-app-standard"]
      virtualbox.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
      virtualbox.customize ["modifyvm", :id, "--memory", "512"]
      virtualbox.customize ["setextradata", :id, "--VBoxInternal2/SharedFoldersEnableSymlinksCreate/v-root", "1"]
    end

end


