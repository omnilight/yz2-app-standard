
VAGRANTFILE_API_VERSION = "2"
Vagrant.require_version ">= 1.7.0"

require 'yaml'
options = YAML.load_file File.join(File.dirname(__FILE__), 'vagrant.yaml')

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|

    config.vm.box = "ubuntu/trusty64"

    # Change ip of the machine to make it available via xip.io
    config.vm.network "private_network", ip: "192.168.7.6", netmask: "255.255.255.0"
    # Use nfs to speed up
    config.vm.synced_folder '.', '/vagrant', nfs: true

    config.vm.provider :virtualbox do |virtualbox|
        virtualbox.customize ["modifyvm", :id, "--name", "#VAGRANT_VM_NAME#"]
        virtualbox.customize ["modifyvm", :id, "--nicpromisc2", "allow-all"]
        virtualbox.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
        virtualbox.customize ["modifyvm", :id, "--memory", "512"]
        virtualbox.customize ["setextradata", :id, "--VBoxInternal2/SharedFoldersEnableSymlinksCreate/v-root", "1"]
    end

    config.vm.provision :shell, :path => "vm/setup.sh", args: [
        options['hosts']['frontend'],
        options['hosts']['backend']
    ]
end
