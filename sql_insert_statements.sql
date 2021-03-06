

INSERT INTO `customer` (`user_id`, `email`, `passphrase`, `display_name`, `business_type`, `flop_demand`, `problem_count`) VALUES ('1', 'Google@google.com', 'Don’tBeEvil', 'Google', 'For_Profit', '10000000', '1');
INSERT INTO `customer` (`user_id`, `email`, `passphrase`, `display_name`, `business_type`, `flop_demand`, `problem_count`) VALUES ('2', 'intel@silicon.com', 'intel4004<3mybeloved', 'Intel', 'For_Profit', '10000', '1');
INSERT INTO `customer` (`user_id`, `email`, `passphrase`, `display_name`, `business_type`, `flop_demand`, `problem_count`) VALUES ('3', 'cat@tractor.org', 'MyExcavator>YourExcavator', 'CAT', 'For_Profit', '1000000', '1');
INSERT INTO `customer` (`user_id`, `email`, `passphrase`, `display_name`, `business_type`, `flop_demand`, `problem_count`) VALUES ('4', 'Tencent@prc.gov', '94Fhr4ndffQb+~', 'TENCENT', 'Non_Profit', '1000000', '1');
INSERT INTO `customer` (`user_id`, `email`, `passphrase`, `display_name`, `business_type`, `flop_demand`, `problem_count`) VALUES ('5', 'barbie@dreams.org', 'MommaNeedsATank', 'BarbieDollCompany', 'Non_Profit', '100000', '1');




INSERT INTO `problem` (`problem_id`, `problem_name`, `weight`) VALUES ('1', 'DataCrunchGmail', 'High');
INSERT INTO `problem` (`problem_id`, `problem_name`, `weight`) VALUES ('2', 'LUTOptIntel', 'Low');
INSERT INTO `problem` (`problem_id`, `problem_name`, `weight`) VALUES ('3', 'StrengthCalcMega2', 'Medium');
INSERT INTO `problem` (`problem_id`, `problem_name`, `weight`) VALUES ('4', 'TencentProject1', 'Low');
INSERT INTO `problem` (`problem_id`, `problem_name`, `weight`) VALUES ('5', 'TotallyNot10000PinkTanks', 'Very_High');

INSERT INTO `customerproblem` (`customer_id`, `problem_id`) VALUES ('1', '1');
INSERT INTO `customerproblem` (`customer_id`, `problem_id`) VALUES ('2', '2');
INSERT INTO `customerproblem` (`customer_id`, `problem_id`) VALUES ('3', '3');
INSERT INTO `customerproblem` (`customer_id`, `problem_id`) VALUES ('4', '4');
INSERT INTO `customerproblem` (`customer_id`, `problem_id`) VALUES ('5', '5');


INSERT INTO `chunk` (`chunk_id`, `weight`, `description`) VALUES ('1', 'Low', 'Analyzation');
INSERT INTO `chunk` (`chunk_id`, `weight`, `description`) VALUES ('2', 'Low', 'Tokenization');
INSERT INTO `chunk` (`chunk_id`, `weight`, `description`) VALUES ('3', 'Low', 'Classic2DbinPackingX');
INSERT INTO `chunk` (`chunk_id`, `weight`, `description`) VALUES ('4', 'Low', 'Classic2DbinPackingY');
INSERT INTO `chunk` (`chunk_id`, `weight`, `description`) VALUES ('5', 'Low', 'StrengthAnalExcatorArm');
INSERT INTO `chunk` (`chunk_id`, `weight`, `description`) VALUES ('6', 'Low', 'StrengthAnalAxel');
INSERT INTO `chunk` (`chunk_id`, `weight`, `description`) VALUES ('7', 'Low', 'Chunk1');
INSERT INTO `chunk` (`chunk_id`, `weight`, `description`) VALUES ('8', 'Low', 'Chunk2');
INSERT INTO `chunk` (`chunk_id`, `weight`, `description`) VALUES ('9', 'Low', 'TorpedoShellSim');
INSERT INTO `chunk` (`chunk_id`, `weight`, `description`) VALUES ('10', 'Low', 'FullRenderArmy');


INSERT INTO `problemchunk` (`problem_id`, `chunk_id`) VALUES ('1', '1');
INSERT INTO `problemchunk` (`problem_id`, `chunk_id`) VALUES ('1' ,'2');
INSERT INTO `problemchunk` (`problem_id`, `chunk_id`) VALUES ('2', '3');
INSERT INTO `problemchunk` (`problem_id`, `chunk_id`) VALUES ('2', '4');
INSERT INTO `problemchunk` (`problem_id`, `chunk_id`) VALUES ('3', '5');
INSERT INTO `problemchunk` (`problem_id`, `chunk_id`) VALUES ('3' ,'6');
INSERT INTO `problemchunk` (`problem_id`, `chunk_id`) VALUES ('4', '7');
INSERT INTO `problemchunk` (`problem_id`, `chunk_id`) VALUES ('4', '8');
INSERT INTO `problemchunk` (`problem_id`, `chunk_id`) VALUES ('5', '9');
INSERT INTO `problemchunk` (`problem_id`, `chunk_id`) VALUES ('5', '10');

INSERT INTO `donator` (`user_id`, `email`, `passphrase`, `display_name`, `none_profit`, `for_profit`, `total_flops`, `computer_count`) VALUES ('1', 'ibm@email.pizza', 'WeWereHereBeforeYou', 'IBMCOMP', '1', '0', '10000', '10'), ('2', 'desi@wesellphones.com', 'IneedAbreak2', 'WeSellPhonesDotCom', '0', '12', '100000', '12'), ('3', 'Ineedcash@rightnow.gold', '!!!!!!!!!woo', 'GoldForCash', '0', '122', '998263', '63'), ('4', 'gemini@br.com', 'MercuryIsAtYourMom', 'Futura', '10', '0', '542100', '52'), ('5', 'inyour@house.rightnow', 'cannotescape', 'HAHAHAHAHA', '42', '0', '936992', '6');

INSERT INTO `computer` (`comp_id`, `core_count`, `gpu_core_count`) VALUES ('1', '2', '0'), ('2', '3', '100'), ('3', '12', '345'), ('4', '12', '1000'), ('5', '12', '1244');

INSERT INTO `donatorcomputer` (`donator_id`, `comp_id`) VALUES ('1', '1'), ('2', '2'), ('3', '3'), ('4', '4'), ('5', '5');

INSERT INTO `payments` (`payment_id`, `chunk_id`, `amount`, `payed_at`, `payer`, `payee`) VALUES ('1', '1', '2834982634.32', '2021-12-01', '1', '1'), ('2', '2', '1231231.58645', '2021-12-01', '2', '2'), ('3', '3', '0.43', '2021-12-24', '3', '3'), ('4', '4', '1435983', '2021-09-06', '4', '4'), ('5', '5', '1.2', '2021-12-01', '5', '5');

INSERT INTO `chunksolvestatus` (`comp_id`, `chunk_id`, `status`, `last_changed_at`) VALUES ('1', '1', 'Done', '2021-12-01'), ('2', '2', 'Done', '2021-12-01'), ('3', '3', 'Done', '2021-12-01'), ('4', '4', 'Done', '2021-12-01'), ('5', '5', 'Done', '2021-12-01');
