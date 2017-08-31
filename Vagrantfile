# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
  config.ssh.insert_key = false

  config.vm.box = "juwai-centos68"
  config.vm.box_url = "http://downloads.juwai.io/devops/boxes/juwai-centos68.box"

  config.vm.network :private_network, ip: "192.168.111.2"
  config.vm.network "forwarded_port", guest: 6002, host: 6002

  config.vm.synced_folder "bootstrap/cache", "/vagrant/bootstrap/cache",
    owner: "vagrant",
    group: "vagrant",
    mount_options: ["dmode=777,fmode=777"]

  config.vm.synced_folder "storage", "/vagrant/storage",
    owner: "vagrant",
    group: "vagrant",
    mount_options: ["dmode=777,fmode=777"]

  host = RbConfig::CONFIG['host_os']

  if Vagrant.has_plugin?("vagrant-vbguest")
    config.vbguest.auto_update = false
  end

  config.vm.provider "virtualbox" do |v|
    # access to all cpu cores on the host
    if host =~ /darwin/
      cpus = `sysctl -n hw.ncpu`.to_i
    elsif host =~ /linux/
      cpus = `nproc`.to_i
    else
      cpus = 2
    end

    v.customize ["modifyvm", :id, "--memory", 1024]
    v.customize ["modifyvm", :id, "--cpus", cpus]

    v.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
  end

  config.vm.provision :ansible do |ansible|
    ansible.playbook = '.provisioning/playbook.yml'
    ansible.inventory_path = '.provisioning/hosts.vagrant'
    ansible.limit = 'all'
    ansible.host_key_checking = false
  end
end
